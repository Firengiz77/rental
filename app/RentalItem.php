<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Feature;
use App\Type;

class RentalItem extends Model
{

	public function carModel(): BelongsTo
	{
		return $this->belongsTo(CarModel::class,'car_model_id','id');
	}

	public function city(): BelongsTo
	{
		return $this->belongsTo(City::class,'city_id');
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class,'user_id','id');
	}

	public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_rental', 'rental_item_id', 'feature_id');
    }

	public function types(): BelongsTo
	{
		return $this->belongsTo(Type::class,'type');
	}




	protected $casts = ['images'=>'array'];
    



	
}
