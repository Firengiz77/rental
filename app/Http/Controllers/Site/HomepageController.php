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
use App\Type;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Helpers\FileManager;
use App\Wishlist;
use App\Feature;
use Carbon\Carbon;
use Hash;


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

		$rentalItems = $rentalItems->limit(40)->orderBy('id','desc')->get();

		return view('site.pages.homepage', compact('brands', 'cities', 'rentalItems', 'models'));
	}

	public function wishlist()
	{

		if(Auth::check()){
            $carts = Wishlist::where('user_id',Auth::id())->get();
        }
        else{
			$carts = \Cart::getContent()->sortDesc();
        }

		return view('site.pages.wishlist',compact('carts'));
	}

	public function yeni_elan(){
		$cities = City::get();
		$brands = Brand::get();
		$carmodels = CarModel::get();
        $types = Type::get();
		$features = Feature::get();
		 
		return view('site.pages.yeni_elan',compact('cities','brands','carmodels','types','features'));
	}

	public function create_new_item(Request $request){
		
		$new_item = new RentalItem();

		$features = Feature::findOrFail($request->features_id);
		if(auth()->check()){
			$user = User::where('id',auth()->id())->firstOrFail();
		}
		else{
			$user = new User();
			$user->name= $request->name;
			$user->email = $request->email;
			$user->phone1 = $request->phone1;
			$user->password = Hash::make(rand(1000,9999));
			$user->save();
		}

		$new_item->user_id = $user->id;
		$new_item->car_model_id = $request->car_model_id;
		$new_item->city_id = $request->city_id;
		$new_item->year = $request->year;
		$new_item->color = $request->color;
		$new_item->gear_box = $request->gear_box;
		$new_item->gear = $request->gear;
		$new_item->seats = $request->seats;
		$new_item->informations = $request->informations;
		$new_item->engine = $request->engine;
		$new_item->horse_power = $request->horse_power;
		$new_item->fuel = $request->fuel;
		$new_item->type = $request->type;
		$new_item->price = $request->price;
		$new_item->brand_name = $request->brand_name;
        $new_item->mileage = $request->mileage;
		$new_item->price_value = $request->price_value;
        $new_item->pincode = $user->id . rand(1000,9999);

        $data = $request->all();

        if ($request->hasFile('images')) {
            $data['images'] = [];
            foreach ($request->file('images') as $key => $file) {
                $data['images'][$key] = FileManager::fileUpload($file, Carbon::now()->format('MY'));
            }
        }

		$new_item->images = json_encode($data['images']);

		$new_item->save();
		$new_item->features()->attach($features);

		toastr()->success('Elanınız yerləşdirildi');

		return redirect()->back();



		

	}



	public function avtosalonlar(){
		$users = User::where('role_id',4)->get();
		
		return view('site.pages.avtosalonlar',compact('users'));
	}

	public function avtosalon_single($user_id){
		$user = User::find($user_id);
		$rentalItems = RentalItem::where('user_id',$user_id)->get();
		$elanlar = RentalItem::where('user_id',$user_id)->get()->count();
		return view('site.pages.avtosalon_single',compact('user','rentalItems','elanlar'));

	}




}
