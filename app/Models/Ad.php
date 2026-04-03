<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'target_audience',
        'position',
        'start_date',
        'end_date',
        'status',
        'is_featured',
        'coins_per_view_subscriber',
        'coins_per_click_subscriber',
        'coins_per_view_non_subscriber',
        'coins_per_click_non_subscriber',
        'max_coins_per_user',
        'total_coins_budget',
    ];


    protected $casts = [
        'start_date' => 'datetime',
        'end_date'   => 'datetime',
    ];

    public function views()
    {
        return $this->hasMany(AdView::class);
    }
}
