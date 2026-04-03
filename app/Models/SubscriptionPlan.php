<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'duration_days',
        'features',
    ];

    protected $casts = [
        'features' => 'array', // automatically cast JSON to array
    ];


    // Plan has many Subscriptions
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'plan_id');
    }
}
