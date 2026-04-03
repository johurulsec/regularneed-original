<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Services\CoinRewardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdViewUserController extends Controller
{
    protected $coinRewardService;

    public function __construct(CoinRewardService $coinRewardService)
    {
        $this->coinRewardService = $coinRewardService;
    }

    public function availableAds()
    {
        $ads = $this->coinRewardService->getAvailableAdsForToday(Auth::user());
        return view('ads.list', compact('ads'));
    }

    public function view(Ad $ad)
    {
        $user = Auth::user();
        $coins = $this->coinRewardService->awardForView($ad, $user);

        $message = $coins > 0
            ? "You have earned $coins coins!"
            : "You have already viewed this ad today or reward limit reached.";

        return back()->with('success', $message);
    }

    public function viewAd(Request $request, $id)
    {
        $user = $request->user();
        $ad = Ad::findOrFail($id);
        $coins = $this->coinRewardService->awardForView($ad, $user);

        return response()->json([
            'success'      => true,
            'ad_id'        => $ad->id,
            'coins_earned' => $coins,
            'total_coins'  => $user->fresh()->coins,
            'message'      => $coins > 0
                ? 'Ad viewed and coins awarded.'
                : 'Already viewed today or reward limit reached.',
        ]);
    }
}
