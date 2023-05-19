<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Wishlist extends Model
{

	use HasFactory;

	
    protected $guarded = false;


	public function product(){
        return $this->belongsTo('App\RentalItem','rental_item_id');
    }


}
