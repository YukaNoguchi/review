<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
      protected $fillable = [
    'images',
  ];
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
    
}
