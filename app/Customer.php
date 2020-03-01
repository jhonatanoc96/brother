<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */


  protected $primaryKey = 'id';
  protected $fillable = [
    'ident', 'first_name', 'last_name', 'email', 'cel', 'tel', 'active'
  ];
}
