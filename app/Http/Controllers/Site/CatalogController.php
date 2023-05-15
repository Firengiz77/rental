<?php

namespace App\Http\Controllers\Site;

use App\Brand;
use App\City;
use App\Http\Controllers\Controller;
use App\RentalItem;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
	public function index(Request $request)
	{
		$rentalItems = RentalItem::query()->with('carModel.brand');
		if ($request->has('sort_by'))
		{
			if ($request->sort_by === 'by_date')
			{
				$rentalItems->orderBy('created_at','desc');
			}
			if ($request->sort_by === 'cheap_first')
			{
				$rentalItems->orderBy('price','asc');
			}
			if ($request->sort_by === 'expensive_first')
			{
				$rentalItems->orderBy('price','desc');
			}
			if ($request->sort_by === 'by_year')
			{
				$rentalItems->orderBy('year','desc');
			}
		}
		$rentalItems = $rentalItems->paginate(40);

		return view('site.pages.catalog', compact('rentalItems'));
	}

	public function premiums()
	{
		$rentalItems = RentalItem::query()->with('carModel.brand');
		$rentalItems = $rentalItems->paginate(40);

		return view('site.pages.premiums',compact('rentalItems'));
	}
}
