<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'brand', 'category', 'category_2', 'price', 'detail', 'images'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function category1()
    {
        return $this->belongsTo('App\Category', 'category', 'id');
    }

    public function category2()
    {
        return $this->belongsTo('App\Category', 'category_2', 'id');
    }

    public function postsPoint()
    {
        return $this->posts()
            ->selectRaw('avg(point) as avg, product_id')
            ->groupBy('product_id');
    }

    public function isLikedBy(User $user)
    {
        return (boolean) $this->favorites()->where('user_id', $user->id)->first();
    }
}
