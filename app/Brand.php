<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Brand extends Model
{
    public function carModels(): HasMany
    {
	    return $this->hasMany(CarModel::class,'brand_id','id');
    }
}
