<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birthday', 'bio', 'gender', 'icon',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function blogs()
    {
        return $this->hasMany('App\Blog');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function follows()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id')->withTimestamps();
    }

    public function likePosts()
    {
        return $this->belongsToMany('App\Post', 'likes');
    }

    public function favoriteProducts()
    {
        return $this->belongsToMany('App\product', 'favorites');
    }
}