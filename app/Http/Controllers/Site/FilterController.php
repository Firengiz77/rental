<?php

namespace App\Http\Controllers\Site;

use App\Brand;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterController extends BaseController
{
    public function getModels(Request $request)
    {
		$brand = Brand::with('carModels')->findOrFail($request->brand);

		return view('site.partials.models-filter',compact('brand'))->render();
    }
}
