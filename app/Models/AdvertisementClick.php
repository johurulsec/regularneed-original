<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertisementClick extends Model
{
    protected $fillable = [
        'advertisement_id',
        'user_id',
        'ip_address',
        'user_agent',
        'session_id',
        'page_url',
        'referrer_url',
        'clicked_at'
    ];

    protected $casts = [
        'clicked_at' => 'datetime',
    ];

    // Relationships
    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
} 