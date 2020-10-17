<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'first_name', 'last_name', 'email', 'email_verified',
    'mobile', 'mobile_verified', 'password',
    'shipping_address', 'shipping_address',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  /*  protected $casts = [
        'email_verified' => 'datetime',
    ];*/

  public function orders()
  {
    return $this->hasMany(Order::class);
  }

  public function payments()
  {
    return $this->hasMany(Payment::class);
  }
  public function shipments()
  {
    return $this->hasMany(Shipment::class);
  }

  public function shippingAddress()
  {
    return $this->hasMany(Address::class, 'id', 'shipping_address');
  }

  public function billingAddress()
  {
    return $this->hasOne(Address::class, 'id', 'billing_address');
  }

  public function wishList()
  {
    return $this->hasOne(WishList::class);
  }

  public function reviews()
  {
    return $this->hasMany(Review::class);
  }
}
