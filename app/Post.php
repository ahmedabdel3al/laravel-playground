<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\traits\Sluggable;

class Post extends Model
{
    use Sluggable ;
    protected $fillable = ['title'];
    
    protected static $sluggable = [
        ['slugName'=>'slug' ,
        'slugRef'=>'title'],

    ];
    
}