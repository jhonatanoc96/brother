<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


	 protected $primaryKey = 'id';
	 protected $fillable = [
        'title', 'description', 'kilometer', 'realized_at', 'active'
    ];



}
