<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'contents', 'image', 'updated_at',
        'created_at',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
