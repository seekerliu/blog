<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'path'];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function getByPath($path)
    {
        return $this->where('path',$path)->first();
    }

}
