<?php

namespace App\Services;

use App\Models\Ad;
use App\Models\AdReward;
use App\User;
use Carbon\Carbon;

class CoinRewardService
{
    /**
     * Get ads available for today that user hasn't viewed yet.
     */
    public function getAvailableAdsForToday(User $user)
    {
        $today = Carbon::today()->toDateString();

        $viewedToday = AdReward::where('user_id', $user->id)
            ->where('action_type', 'view')
            ->whereDate('created_at', $today)
            ->pluck('ad_id');

        return Ad::where('is_featured', 1) // Only featured ads give coins
            ->whereNotIn('id', $viewedToday)
            ->get();
    }

    /**
     * Award coins for viewing an ad.
     */
    public function awardForView(Ad $ad, User $user): int
    {
        $today = Carbon::today()->toDateString();

        // Only featured ads give coins
        if ($ad->is_featured != 1) {
            return 0;
        }

        // Already viewed today?
        $alreadyToday = AdReward::where('ad_id', $ad->id)
            ->where('user_id', $user->id)
            ->where('action_type', 'view')
            ->whereDate('created_at', $today)
            ->exists();

        if ($alreadyToday) {
            return 0;
        }

        // Base coins: subscription vs non-subscription
        $coins = $user->is_subscribed
            ? ($ad->coins_per_view_subscriber ?? 10)
            : ($ad->coins_per_view_non_subscriber ?? 5);

        // Check max coins per user for this ad
        if ($ad->max_coins_per_user > 0) {
            $userTotal = AdReward::where('ad_id', $ad->id)
                ->where('user_id', $user->id)
                ->sum('coins');

            $remainingForUser = $ad->max_coins_per_user - $userTotal;
            if ($remainingForUser <= 0) {
                return 0;
            }
            $coins = min($coins, $remainingForUser);
        }

        // Check total budget for this ad
        if ($ad->total_coins_budget > 0) {
            $adTotal = AdReward::where('ad_id', $ad->id)->sum('coins');
            $remainingBudget = $ad->total_coins_budget - $adTotal;
            if ($remainingBudget <= 0) {
                return 0;
            }
            $coins = min($coins, $remainingBudget);
        }

        if ($coins <= 0) {
            return 0;
        }

        // Increment user's coins
        $user->increment('coins', $coins);

        // Save reward record
        AdReward::create([
            'ad_id'       => $ad->id,
            'user_id'     => $user->id,
            'coins'       => $coins,
            'action_type' => 'view',
        ]);

        return $coins;
    }
}
