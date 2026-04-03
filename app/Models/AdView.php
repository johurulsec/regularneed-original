<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdView extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'ad_id',
        'points_earned',
        'ad_name',
        'photo',
        'description',
        'link_url',
        'target_audience',
        'position',
        'start_date',
        'end_date',
        'status',
        'views_count',
        'clicks_count',
        'is_featured',
        'viewed_at'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
