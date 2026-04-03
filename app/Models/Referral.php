<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = ['referrer_id', 'referred_id', 'referral_code', 'has_purchased', 'points_earned'];

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }
    public function referred()
    {
        return $this->belongsTo(User::class, 'referred_id');
    }
}
