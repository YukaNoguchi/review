<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
    protected $fillable = [
        'title', 'contents'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
