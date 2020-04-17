<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debttemp extends Model
{
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $primaryKey = 'id';
   protected $table = 'debts_temp';
	 protected $fillable = [
        'description', 'amount', 'active', 'income_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    public function Customer(){
      return $this->belongsTo('App\Income');
    }

}
