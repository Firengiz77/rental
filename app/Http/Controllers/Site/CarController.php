<?php

namespace App\Http\Controllers\Site;

use App\CarModel;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\RentalItem;
use Illuminate\Http\Request;
use App\Feature;
use App\Brand;
use App\City;
use App\Type;
use Carbon\Carbon;
use App\Helpers\FileManager;
use App\Models\User;

class CarController extends BaseController
{
    public function index(CarModel $carModel, RentalItem $rentalItem)
    {
      $rentalItem->view_count++;
      $rentalItem->save();
		$rentalItem->load('carModel.brand');
    $features = Feature::get();
		return view('site.pages.single-car',compact('rentalItem','features'));
    }

    public function delete_item(RentalItem $rentalItem,Request $request){
     $item = RentalItem::findOrFail($rentalItem->id);
     
     if($item->pincode == $request->pincode){
      RentalItem::findOrFail($rentalItem->id)->delete();

      toastr()->success('Elan Uğurla Silindi');
      return redirect()->route('index');
     }else{
      toastr()->error('Pin Kod Yanlışdır');
      return redirect()->route('index');
     }
    }


    public function redirect_update_item(RentalItem $rentalItem,Request $request){
      $item = RentalItem::findOrFail($rentalItem->id);
       

      if($item->pincode == $request->pincode){
            $cities = City::get();
            $brands = Brand::get();
            $carmodels = CarModel::get();
            $types = Type::get();
           $features = Feature::get();
           $user= User::where('id',$item->user_id)->firstOrFail();
        return view('site.pages.update_item',compact('item','cities','brands','carmodels','types','features','user'));
      }else{
        toastr()->error('Pin Kod Yanlışdır');
        return redirect()->route('index');
      }
    }

     
    public function update_item(RentalItem $rentalItem,Request $request){


      $item = RentalItem::findOrFail($rentalItem->id);
      $features = Feature::findOrFail($request->features_id);
      
		$item->car_model_id = $request->car_model_id;
		$item->city_id = $request->city_id;
		$item->year = $request->year;
		$item->color = $request->color;
		$item->gear_box = $request->gear_box;
		$item->gear = $request->gear;
		$item->seats = $request->seats;
		$item->informations = $request->informations;
		$item->engine = $request->engine;
		$item->horse_power = $request->horse_power;
		$item->fuel = $request->fuel;
		$item->type = $request->type;
		$item->price = $request->price;
		$item->brand_name = $request->brand_name;
    $item->mileage = $request->mileage;
		$item->price_value = $request->price_value;

    $item->save();

		$item->features()->sync($features);


    toastr()->success('Elanınız Yeniləndi');

		return redirect()->route('index');

     // return view('site.pages.update_item');

    }


    public function delete_images($id, Request $request){
      $key = $request->key;
      //$data = $request->all();
     // dd($key);
    
      $fullImgPath = storage_path("rental-items/".Carbon::now()->format('MY')."/$key.jpg");
      $product = RentalItem::findOrFail($id);
      $images = $product->images;
      unset($images[$key]);
      $product->update([
          'images'=>$images,
      ]);
      
      //  foreach ($photos->image as $img) {
      //     FileManager::fileDelete('photos', $img);
      //  }
  return response()->json(['success'=>true,'images'=>$product->images]);
  }




}
