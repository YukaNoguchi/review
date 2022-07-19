<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function isLikedBy(User $user)
    {
        return (boolean) $this->likes()->where('user_id', $user->id)->first();
    }
}
