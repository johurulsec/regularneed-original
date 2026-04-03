<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'photo', 'status', 'category_id', 'url'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
