<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdView;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdViewController extends Controller
{
    /**
     * Track an ad view and award coins to the user.
     */
    public function viewAd(Request $request, $adId)
    {
        $user = $request->user();
        $ad = Ad::findOrFail($adId);

        // Prevent duplicate views in the same day
        $alreadyViewed = AdView::where('user_id', $user->id)
            ->where('ad_id', $adId)
            ->whereDate('created_at', now()->toDateString())
            ->exists();

        if ($alreadyViewed) {
            return response()->json(['message' => 'You already viewed this ad today.'], 400);
        }

        // Store ad view
        AdView::create([
            'user_id' => $user->id,
            'ad_id' => $adId
        ]);

        // Give coins based on subscription
        $coinsToAdd = $user->is_subscribed ? 10 : 5;
        $user->addCoins($coinsToAdd);

        // Log transaction
        Transaction::create([
            'user_id'    => $user->id,
            'type'       => 'ad_view',
            'points'     => $coinsToAdd,
            'description' => "Earned {$coinsToAdd} coins for viewing ad: {$ad->title}"
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ad viewed successfully!',
            'coins_earned' => $coinsToAdd,
            'total_coins' => $user->coins
        ]);
    }

    /**
     * Track an ad click.
     */
    public function trackAdClick(Request $request)
    {
        $request->validate([
            'ad_view_id' => 'required|exists:ad_views,id'
        ]);

        $adView = AdView::findOrFail($request->ad_view_id);
        $adView->increment('clicks_count');

        return response()->json([
            'success' => true,
            'message' => 'Ad click recorded successfully.'
        ]);
    }
}
