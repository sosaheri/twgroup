<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function publicacion(){

        return $this->belongsTo('App\Publication');
    }
}
