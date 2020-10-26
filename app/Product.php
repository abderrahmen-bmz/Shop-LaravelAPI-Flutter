<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
      'title', 'description', 'unit',
      'price','total',
  ];


  public function images(){
    return $this->hasMany(Image::class);
  }
  public function reviews(){
    return $this->hasMany(Review::class);
  }

  public function category(){
    return $this->belongsTo(Category::class);
  }

  public function tags(){
    return $this->belongsToMany(Tag::class);
  }

  public function units(){
    return $this->belongsTo(Unit::class,'unit','id');
  }
}
