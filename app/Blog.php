<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model implements SluggableInterface
{
    use SluggableTrait;


    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];
}
