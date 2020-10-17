<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillabe = ['name'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
