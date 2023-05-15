<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CarModel extends Model
{
    public function brand(): BelongsTo
    {
	    return $this->belongsTo(Brand::class,'brand_id','id');
    }
}
