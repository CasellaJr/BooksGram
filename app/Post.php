<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user() //user is singular
    { 
        return $this->belongsTo(User::class);
    }
}
