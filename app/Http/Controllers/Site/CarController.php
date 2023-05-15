<?php

namespace App\Http\Controllers\Site;

use App\CarModel;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\RentalItem;
use Illuminate\Http\Request;

class CarController extends BaseController
{
    public function index(CarModel $carModel, RentalItem $rentalItem)
    {
		$rentalItem->load('carModel.brand');

		return view('site.pages.single-car',compact('rentalItem'));
    }
}
