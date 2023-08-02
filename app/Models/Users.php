<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    public function following()
    {
        return $this->belongsToMany(Users::class, 'follows', 'follower_id', 'followed_id');
    }

    public function followers()
    {
        return $this->belongsToMany(Users::class, 'follows', 'followed_id', 'follower_id');
    }

    public function isFollowing($userId)
    {
        return (bool) $this->following()->where('followed_id', $userId)->first(['id']);
    }

}
