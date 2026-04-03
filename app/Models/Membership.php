<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'monthly_price',
        'ad_view_points_multiplier',
        'referral_points_multiplier',
        'benefits'
    ];

    public function userMemberships()
    {
        return $this->hasMany(UserMembership::class);
    }
}
