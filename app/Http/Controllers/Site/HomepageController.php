<?php

namespace App\Http\Controllers\Site;

use App\Brand;
use App\CarModel;
use App\City;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\RentalItem;
use Faker\Provider\Base;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\View\View;

class HomepageController extends BaseController
{
	public function index(Request $request): Application|View|Factory
	{
		$brands      = Brand::all();
		$cities      = City::all();
		$rentalItems = RentalItem::query()->with('carModel.brand');
		$models      = false;

		if (!$request->isNotFilled('brand')) {
			$rentalItems->whereHas('carModel.brand', function ($qr) use ($request) {
				$qr->where('id', $request->brand);
			});
		}

		if (!$request->isNotFilled('model')) {
			$rentalItems->whereHas('carModel', function ($qr) use ($request) {
				$qr->where('id', $request->model);
			});
			$models = CarModel::whereHas('brand', function ($qr) use ($request) {
				$qr->where('id', $request->brand);
			})->get();
		}

		if (!$request->isNotFilled('city')) {
			$rentalItems->whereHas('city', function ($qr) use ($request) {
				$qr->where('id', $request->city);
			});
		}

		if (!$request->isNotFilled('min_value')) {
			$rentalItems->where('price', '>', $request->min_value);
		}

		if (!$request->isNotFilled('max_value')) {
			$rentalItems->where('price', '<', $request->max_value);
		}

		if (!$request->isNotFilled('year_min')) {
			$rentalItems->where('year', '>', $request->year_min);
		}

		if (!$request->isNotFilled('year_max')) {
			$rentalItems->where('year', '<', $request->year_max);
		}

		if (!$request->isNotFilled('fuel_type')) {
			$rentalItems->where('fuel', $request->fuel_type);
		}

		if (!$request->isNotFilled('body_style')) {
			$rentalItems->where('type', $request->body_style);
		}

		$rentalItems = $rentalItems->limit(40)->get();

		return view('site.pages.homepage', compact('brands', 'cities', 'rentalItems', 'models'));
	}

	public function wishlist()
	{
		return view('site.pages.wishlist');
	}
}
