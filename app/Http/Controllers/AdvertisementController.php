<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\AdvertisementView;
use App\Models\AdvertisementClick;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::withCount(['views', 'clicks'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('backend.advertisement.index', compact('advertisements'));
    }

    public function create()
    {
        return view('backend.advertisement.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'required|string',
            'link_url' => 'nullable|url',
            'target_audience' => 'nullable|string|max:255',
            'position' => 'required|string|max:100',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|in:active,inactive,pending',
            'budget' => 'nullable|numeric|min:0',
            'cost_per_click' => 'nullable|numeric|min:0',
            'cost_per_view' => 'nullable|numeric|min:0',
            'ad_type' => 'required|string|max:100',
            'priority' => 'nullable|integer|min:0',
            'is_featured' => 'boolean'
        ]);

        $validatedData['slug'] = $this->generateUniqueSlug($request->title);
        $validatedData['is_featured'] = $request->has('is_featured');

        $advertisement = Advertisement::create($validatedData);

        $message = $advertisement
            ? 'Advertisement successfully created'
            : 'Error occurred while creating advertisement';

        return redirect()->route('advertisement.index')->with(
            $advertisement ? 'success' : 'error',
            $message
        );
    }

    public function show($id)
    {
        $advertisement = Advertisement::with(['views', 'clicks'])->findOrFail($id);

        // Get analytics data
        $analytics = $this->getAdvertisementAnalytics($id);

        return view('backend.advertisement.show', compact('advertisement', 'analytics'));
    }

    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('backend.advertisement.edit', compact('advertisement'));
    }

    public function update(Request $request, $id)
    {
        $advertisement = Advertisement::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'required|string',
            'link_url' => 'nullable|url',
            'target_audience' => 'nullable|string|max:255',
            'position' => 'required|string|max:100',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|in:active,inactive,pending',
            'budget' => 'nullable|numeric|min:0',
            'cost_per_click' => 'nullable|numeric|min:0',
            'cost_per_view' => 'nullable|numeric|min:0',
            'ad_type' => 'required|string|max:100',
            'priority' => 'nullable|integer|min:0',
            'is_featured' => 'boolean'
        ]);

        $validatedData['is_featured'] = $request->has('is_featured');

        $status = $advertisement->update($validatedData);

        $message = $status
            ? 'Advertisement successfully updated'
            : 'Error occurred while updating advertisement';

        return redirect()->route('advertisement.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }

    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $status = $advertisement->delete();

        $message = $status
            ? 'Advertisement successfully deleted'
            : 'Error occurred while deleting advertisement';

        return redirect()->route('advertisement.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }

    // Analytics methods
    public function analytics()
    {
        $analytics = $this->getOverallAnalytics();
        return view('backend.advertisement.analytics', compact('analytics'));
    }

    public function trackView(Request $request, $id)
    {
        $advertisement = Advertisement::findOrFail($id);

        // Check if this is a valid view (not from admin panel, etc.)
        if ($this->isValidView($request)) {
            $advertisement->incrementViews();

            // Record detailed view
            AdvertisementView::create([
                'advertisement_id' => $advertisement->id,
                'user_id' => auth()->id(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'session_id' => $request->session()->getId(),
                'page_url' => $request->url(),
                'referrer_url' => $request->header('referer'),
                'viewed_at' => now()
            ]);

            // Award coins to user if authenticated and advertisement has coin rewards
            $coinsAwarded = 0;
            $message = '';

            if (auth()->check() && $advertisement->coins_per_view > 0) {
                $transaction = $advertisement->awardCoinsForView(auth()->id());
                if ($transaction) {
                    $coinsAwarded = $advertisement->coins_per_view;
                    $message = "You earned {$coinsAwarded} coins for viewing this advertisement!";
                }
            }

            return response()->json([
                'success' => true,
                'coins_awarded' => $coinsAwarded,
                'message' => $message
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function trackClick(Request $request, $id)
    {
        $advertisement = Advertisement::findOrFail($id);

        // Check if this is a valid click
        if ($this->isValidClick($request)) {
            $advertisement->incrementClicks();

            // Record detailed click
            AdvertisementClick::create([
                'advertisement_id' => $advertisement->id,
                'user_id' => auth()->id(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'session_id' => $request->session()->getId(),
                'page_url' => $request->url(),
                'referrer_url' => $request->header('referer'),
                'clicked_at' => now()
            ]);

            // Award coins to user if authenticated and advertisement has coin rewards
            if (auth()->check() && $advertisement->coins_per_click > 0) {
                $advertisement->awardCoinsForClick(auth()->id());
            }
        }

        return redirect($advertisement->link_url);
    }

    public function completeModal(Request $request, $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        
        if (!auth()->check()) {
            return response()->json(['success' => false, 'message' => 'User not authenticated']);
        }

        // Record the view first
        $advertisement->incrementViews();
        
        // Record detailed view
        AdvertisementView::create([
            'advertisement_id' => $advertisement->id,
            'user_id' => auth()->id(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'session_id' => $request->session()->getId(),
            'page_url' => $request->url(),
            'referrer_url' => $request->header('referer'),
            'viewed_at' => now()
        ]);

        // Award coins based on subscription status
        $result = $advertisement->awardCoinsForModalView(auth()->id());
        
        if ($result) {
            return response()->json([
                'success' => true,
                'coins_awarded' => $result['coins_awarded'],
                'has_subscription' => $result['has_subscription'],
                'message' => "You earned {$result['coins_awarded']} coins for completing this advertisement!"
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'You have already earned coins from this advertisement recently.'
            ]);
        }
    }

    // Helper methods
    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $count = Advertisement::where('slug', $slug)->count();

        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }

        return $slug;
    }

    private function isValidView(Request $request)
    {
        // Prevent tracking from admin panel
        if (str_contains($request->url(), '/admin')) {
            return false;
        }

        // Prevent duplicate views from same session within short time
        $recentView = AdvertisementView::where('advertisement_id', $request->route('id'))
            ->where('session_id', $request->session()->getId())
            ->where('viewed_at', '>', now()->subMinutes(5))
            ->exists();

        return !$recentView;
    }

    private function isValidClick(Request $request)
    {
        // Prevent tracking from admin panel
        if (str_contains($request->url(), '/admin')) {
            return false;
        }

        // Prevent duplicate clicks from same session within short time
        $recentClick = AdvertisementClick::where('advertisement_id', $request->route('id'))
            ->where('session_id', $request->session()->getId())
            ->where('clicked_at', '>', now()->subMinutes(1))
            ->exists();

        return !$recentClick;
    }

    private function getAdvertisementAnalytics($id)
    {
        $advertisement = Advertisement::findOrFail($id);

        // Daily views for last 30 days
        $dailyViews = AdvertisementView::where('advertisement_id', $id)
            ->where('viewed_at', '>=', now()->subDays(30))
            ->selectRaw('DATE(viewed_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Daily clicks for last 30 days
        $dailyClicks = AdvertisementClick::where('advertisement_id', $id)
            ->where('clicked_at', '>=', now()->subDays(30))
            ->selectRaw('DATE(clicked_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Top referrers
        $topReferrers = AdvertisementView::where('advertisement_id', $id)
            ->whereNotNull('referrer_url')
            ->selectRaw('referrer_url, COUNT(*) as count')
            ->groupBy('referrer_url')
            ->orderBy('count', 'desc')
            ->limit(10)
            ->get();

        return [
            'dailyViews' => $dailyViews,
            'dailyClicks' => $dailyClicks,
            'topReferrers' => $topReferrers,
            'ctr' => $advertisement->getCTR(),
            'totalSpent' => $advertisement->getTotalSpent()
        ];
    }

    private function getOverallAnalytics()
    {
        // Overall statistics
        $totalAds = Advertisement::count();
        $activeAds = Advertisement::where('status', 'active')->count();
        $totalViews = Advertisement::sum('views_count');
        $totalClicks = Advertisement::sum('clicks_count');
        $totalSpent = Advertisement::sum(DB::raw('(views_count * cost_per_view) + (clicks_count * cost_per_click)'));

        // Top performing ads
        $topAds = Advertisement::orderBy('clicks_count', 'desc')
            ->limit(10)
            ->get();

        // Monthly trends
        $monthlyViews = AdvertisementView::where('viewed_at', '>=', now()->subMonths(6))
            ->selectRaw('YEAR(viewed_at) as year, MONTH(viewed_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        return [
            'totalAds' => $totalAds,
            'activeAds' => $activeAds,
            'totalViews' => $totalViews,
            'totalClicks' => $totalClicks,
            'totalSpent' => $totalSpent,
            'topAds' => $topAds,
            'monthlyViews' => $monthlyViews
        ];
    }
}
