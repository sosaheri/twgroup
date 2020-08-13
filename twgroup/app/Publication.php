<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'title', 'content',
    ];

    public function comentarios(){

        return $this->hasMany('App\Comment');

    }
}
