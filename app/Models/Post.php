<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function cate(){
        return $this->belongsTo('App\Models\Category');
    }

    // public function tag(){
    //     $this->belongsToMany('App\Models\tag');
    // }
}
