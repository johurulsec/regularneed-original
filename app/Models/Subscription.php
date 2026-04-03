<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'user_id',
        'plan_id',
        'price',
        'status',
        'start_date',
        'end_date',
        'auto_renew',
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'auto_renew' => 'boolean',
    ];

    const STATUS_ACTIVE = 'active';
    const STATUS_EXPIRED = 'expired';
    const STATUS_CANCELLED = 'cancelled';


    // Subscription belongs to a Plan
    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'plan_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * Check if subscription is active
     */
    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE &&
            $this->end_date &&
            $this->end_date->isFuture();
    }

    /**
     * Get active subscription for a user
     */
    public static function getActiveSubscription($userId)
    {
        return self::where('user_id', $userId)
            ->where('status', self::STATUS_ACTIVE)
            ->where('end_date', '>', now())
            ->first();
    }

    /**
     * Check if user has active subscription
     */
    public static function hasActiveSubscription($userId)
    {
        return self::getActiveSubscription($userId) !== null;
    }
}
