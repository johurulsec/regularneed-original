<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'photo',
        'link_url',
        'target_audience',
        'position',
        'start_date',
        'end_date',
        'status',
        'views_count',
        'clicks_count',
        'budget',
        'cost_per_click',
        'cost_per_view',
        'ad_type', // banner, popup, sidebar, etc.
        'priority',
        'is_featured',
        'coins_per_view',
        'coins_per_click',
        'max_coins_per_user',
        'total_coins_budget'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_featured' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('start_date')
                    ->orWhere('start_date', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            });
    }

    public function scopeByPosition($query, $position)
    {
        return $query->where('position', $position);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('ad_type', $type);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Relationships
    public function views()
    {
        return $this->hasMany(AdvertisementView::class);
    }

    public function clicks()
    {
        return $this->hasMany(AdvertisementClick::class);
    }

    // Methods
    public function incrementViews()
    {
        $this->increment('views_count');
    }

    public function incrementClicks()
    {
        $this->increment('clicks_count');
    }

    public function getCTR()
    {
        if ($this->views_count == 0) {
            return 0;
        }
        return round(($this->clicks_count / $this->views_count) * 100, 2);
    }

    public function getTotalSpent()
    {
        return ($this->views_count * $this->cost_per_view) + ($this->clicks_count * $this->cost_per_click);
    }

    public function isActive()
    {
        return $this->status === 'active' &&
            ($this->start_date === null || $this->start_date <= now()) &&
            ($this->end_date === null || $this->end_date >= now());
    }

    /**
     * Get total coins spent on this advertisement
     */
    public function getTotalCoinsSpent()
    {
        $viewCoins = $this->views()->count() * ($this->coins_per_view ?? 0);
        $clickCoins = $this->clicks()->count() * ($this->coins_per_click ?? 0);
        return $viewCoins + $clickCoins;
    }

    /**
     * Check if advertisement has remaining coin budget
     */
    public function hasRemainingCoinBudget()
    {
        if (!$this->total_coins_budget) {
            return true; // No budget limit
        }
        return $this->getTotalCoinsSpent() < $this->total_coins_budget;
    }

    /**
     * Get coins earned by a specific user from this advertisement
     */
    public function getCoinsEarnedByUser($userId)
    {
        $viewCoins = $this->views()->where('user_id', $userId)->count() * ($this->coins_per_view ?? 0);
        $clickCoins = $this->clicks()->where('user_id', $userId)->count() * ($this->coins_per_click ?? 0);
        return $viewCoins + $clickCoins;
    }

    /**
     * Check if user can earn more coins from this advertisement
     */
    public function canUserEarnMoreCoins($userId)
    {
        if (!$this->max_coins_per_user) {
            return true; // No per-user limit
        }
        return $this->getCoinsEarnedByUser($userId) < $this->max_coins_per_user;
    }

    /**
     * Award coins to user for viewing this advertisement
     */
    public function awardCoinsForView($userId)
    {
        if (!$this->coins_per_view || !$this->hasRemainingCoinBudget() || !$this->canUserEarnMoreCoins($userId)) {
            return false;
        }

        // Check if user has already viewed this ad recently (within 24 hours)
        $recentView = $this->views()
            ->where('user_id', $userId)
            ->where('viewed_at', '>=', now()->subDay())
            ->first();

        if ($recentView) {
            return false; // Already viewed recently
        }

        // Award coins
        $transaction = \App\Models\CoinTransaction::credit(
            $userId,
            $this->coins_per_view,
            "Coins earned for viewing advertisement: {$this->title}",
            'App\Models\Advertisement',
            $this->id
        );

        return $transaction;
    }

    /**
     * Award coins to user for completing modal view (subscription-based)
     */
    public function awardCoinsForModalView($userId)
    {
        // Check if user has already completed this ad modal recently (within 24 hours)
        $recentView = $this->views()
            ->where('user_id', $userId)
            ->where('viewed_at', '>=', now()->subDay())
            ->first();

        if ($recentView) {
            return false; // Already viewed recently
        }

        // Determine coin amount based on subscription status
        $user = \App\User::find($userId);
        $coinAmount = $user->hasActiveSubscription() ? 10 : 5;

        // Award coins
        $transaction = \App\Models\CoinTransaction::credit(
            $userId,
            $coinAmount,
            "Coins earned for completing advertisement modal: {$this->title}",
            'App\Models\Advertisement',
            $this->id
        );

        return [
            'success' => true,
            'coins_awarded' => $coinAmount,
            'has_subscription' => $user->hasActiveSubscription(),
            'transaction' => $transaction
        ];
    }

    /**
     * Award coins to user for clicking this advertisement
     */
    public function awardCoinsForClick($userId)
    {
        if (!$this->coins_per_click || !$this->hasRemainingCoinBudget() || !$this->canUserEarnMoreCoins($userId)) {
            return false;
        }

        // Check if user has already clicked this ad recently (within 1 hour)
        $recentClick = $this->clicks()
            ->where('user_id', $userId)
            ->where('clicked_at', '>=', now()->subHour())
            ->first();

        if ($recentClick) {
            return false; // Already clicked recently
        }

        // Award coins
        $transaction = \App\Models\CoinTransaction::credit(
            $userId,
            $this->coins_per_click,
            "Coins earned for clicking advertisement: {$this->title}",
            'App\Models\Advertisement',
            $this->id
        );

        return $transaction;
    }
}
