<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 protected $primaryKey = 'id';
	 protected $fillable = [
        'description', 'amount', 'amountAvailable', 'active', 'customer_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    public function Customer(){
      return $this->belongsTo('App\Customer');
    }

}
