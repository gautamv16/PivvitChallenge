<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
     protected $table = 'purchase';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['customerName', 'offerinID'];
	
	public function offering(){
     return $this->belongsTo('App\Models\Offering','offeringID');
    }
}
