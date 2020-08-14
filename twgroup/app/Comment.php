<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $with = ['usuario'];

    public function publicacion(){

        return $this->belongsTo('App\Publication');
    }

    public function usuario(){

        return $this->belongsTo('App\User');
    }
}
