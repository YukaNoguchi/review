<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }
    protected $fillable = [
        'following_id', 'followed_id'
    ];
}