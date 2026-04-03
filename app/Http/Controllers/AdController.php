<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->paginate(10);
        return view('backend.ads.index', compact('ads'));
    }

    public function create()
    {
        return view('backend.ads.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'                      => 'required|string|max:255',
            'description'                => 'nullable|string',
            'image'                      => 'nullable|string',
            'link'                       => 'nullable|url',
            'target_audience'            => 'nullable|string|max:255',
            'position'                   => 'nullable|string|max:255',
            'start_date'                 => 'nullable|date',
            'end_date'                   => 'nullable|date|after_or_equal:start_date',
            'status'                     => 'required|in:active,inactive',
            'is_featured'                => 'nullable|boolean',
            'coins_per_view_subscriber'  => 'nullable|integer|min:0',
            'coins_per_click_subscriber' => 'nullable|integer|min:0',
            'coins_per_view_non_subscriber'  => 'nullable|integer|min:0',
            'coins_per_click_non_subscriber' => 'nullable|integer|min:0',
            'max_coins_per_user'         => 'nullable|integer|min:0',
            'total_coins_budget'         => 'nullable|integer|min:0',
        ]);

        // Normalize dates only if present
        if (!empty($validatedData['start_date'])) {
            $validatedData['start_date'] = date('Y-m-d H:i:s', strtotime($validatedData['start_date']));
        }
        if (!empty($validatedData['end_date'])) {
            $validatedData['end_date'] = date('Y-m-d H:i:s', strtotime($validatedData['end_date']));
        }

        // Normalize checkbox (true if checked, false otherwise)
        $validatedData['is_featured'] = $request->has('is_featured');

        // Create ad
        $ad = Ad::create($validatedData);

        $message = $ad ? 'Ad successfully added' : 'Error occurred while adding ad';

        return redirect()->route('ads.index')->with(
            $ad ? 'success' : 'error',
            $message
        );
    }


    public function edit(Ad $ad)
    {
        return view('backend.ads.edit', compact('ad'));
    }

    public function update(Request $request, Ad $ad)
    {
        $validatedData = $request->validate([
            'title'                      => 'required|string|max:255',
            'description'                => 'nullable|string',
            'image'                      => 'nullable|string',
            'link'                       => 'nullable|url',
            'target_audience'            => 'nullable|string|max:255',
            'position'                   => 'nullable|string|max:255',
            'start_date'                 => 'nullable|date',
            'end_date'                   => 'nullable|date|after_or_equal:start_date',
            'status'                     => 'required|in:active,inactive',
            'is_featured'                => 'nullable|boolean',
            'coins_per_view_subscriber'  => 'nullable|integer|min:0',
            'coins_per_click_subscriber' => 'nullable|integer|min:0',
            'coins_per_view_non_subscriber'  => 'nullable|integer|min:0',
            'coins_per_click_non_subscriber' => 'nullable|integer|min:0',
            'max_coins_per_user'         => 'nullable|integer|min:0',
            'total_coins_budget'         => 'nullable|integer|min:0',
        ]);

        // Normalize dates only if present
        if (!empty($validatedData['start_date'])) {
            $validatedData['start_date'] = date('Y-m-d H:i:s', strtotime($validatedData['start_date']));
        }
        if (!empty($validatedData['end_date'])) {
            $validatedData['end_date'] = date('Y-m-d H:i:s', strtotime($validatedData['end_date']));
        }

        // Normalize checkbox (true if checked, false otherwise)
        $validatedData['is_featured'] = $request->has('is_featured');

        $ad->update($validatedData);

        return redirect()->route('ads.index')->with('success', 'Ad updated successfully.');
    }


    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        $status = $ad->delete();

        $message = $status ? 'Ad successfully deleted' : 'Error occurred while deleting ad';

        return redirect()->route('ads.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }
}
