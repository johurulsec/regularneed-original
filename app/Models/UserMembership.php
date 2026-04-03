<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserMembership extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'membership_id', 'start_date', 'end_date', 'is_active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}
