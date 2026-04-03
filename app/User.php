<?php

namespace App;

use App\Models\Order;
use App\Models\AdView;
use App\Models\Referral;
use App\Models\Membership;
use App\Models\Transaction;
use App\Models\Subscription;
use App\Models\UserMembership;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'photo',
        'status',
        'provider',
        'provider_id',
        'coins',
        'is_subscribed'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'subscription_ends_at' => 'datetime',
    ];

    /**
     * Check if the user has an active subscription.
     *
     * @return bool
     */
    public function hasSubscription()
    {
        return $this->subscriptions()
            ->where('status', 'active')
            ->where('end_date', '>', now())
            ->exists();
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'user_id');
    }

    // -------------------------------
    // Relationships
    // -------------------------------
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function adViews()
    {
        return $this->hasMany(AdView::class);
    }

    public function userMembership()
    {
        return $this->hasOne(UserMembership::class);
    }

    public function activeMembership()
    {
        return $this->userMembership()
            ->where('is_active', true)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now());
    }

    public function referralsMade()
    {
        return $this->hasMany(Referral::class, 'referrer_id');
    }

    public function referralsReceived()
    {
        return $this->hasMany(Referral::class, 'referred_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    // -------------------------------
    // Accessors
    // -------------------------------
    public function getMembershipMultiplierAttribute()
    {
        $um = $this->activeMembership()->first();
        return $um ? $um->membership->ad_view_points_multiplier : 1;
    }

    // -------------------------------
    // Coins Helpers
    // -------------------------------
    public function hasActiveSubscription()
    {
        return Subscription::hasActiveSubscription($this->id);
    }

    public function addCoins($amount)
    {
        $this->increment('coins', $amount);
        return $this;
    }

    public function deductCoins($amount)
    {
        if ($this->coins >= $amount) {
            $this->decrement('coins', $amount);
            return true;
        }
        return false;
    }

    public function getCoinsBalance()
    {
        return $this->coins;
    }

    public function hasEnoughCoins($amount)
    {
        return $this->coins >= $amount;
    }
}
