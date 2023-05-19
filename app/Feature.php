<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Feature extends Model
{ 
    
    public function rental_items()
    {
        return $this->belongsToMany(RentalItem::class, 'feature_rental', 'feature_id', 'rental_item_id');
    }
    
}
