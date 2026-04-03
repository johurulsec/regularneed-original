<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AdReward extends Model
{
    protected $fillable = [
        'ad_id',
        'user_id',
        'coins',
        'action_type'
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
