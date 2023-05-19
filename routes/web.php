<?php

use App\Http\Controllers\Site\CarController;
use App\Http\Controllers\Site\CatalogController;
use App\Http\Controllers\Site\HomepageController;
use Illuminate\Support\Facades\Route;


Route::controller(HomepageController::class)->group(function () {
	Route::get('/', 'index')->name('index');
	Route::get('/wishlist','wishlist')->name('wishlist');
	Route::get('/yeni-elan','yeni_elan')->name('yeni_elan');
	Route::post('create_new_item','create_new_item')->name('create_new_item');
	Route::get('/avtosalonlar','avtosalonlar')->name('avtosalonlar');
	Route::get('/avtosalon/{id}','avtosalon_single')->name('avtosalon_single');

});
Route::controller(CarController::class)->name('car.')->prefix('car')->group(function () {
	Route::get('{car_model:slug}/{rental_item}', 'index')->name('index');

	Route::post('delete_item/{rental_item}','delete_item')->name('delete_item');
	Route::post('redirect_update_item/{rental_item}','redirect_update_item')->name('redirect_update_item');
	Route::post('update_item/{rental_item}','update_item')->name('update_item');
	Route::post('/delete_images/{id}','delete_images')->name('delete_images');
	


});
Route::controller(CatalogController::class)->name('catalog.')->group(function (){
	Route::get('/catalog','index')->name('index');
	Route::get('/premiums','premiums')->name('premiums');
});

Route::controller(\App\Http\Controllers\Site\FilterController::class)->name('filter.')->group(function () {
	Route::get('get-models}', 'getModels')->name('get-models');
});


Route::controller(\App\Http\Controllers\Site\ActionController::class)->group(function () {
	Route::get('/add_to_cart/{id}','add_to_cart')->name('add_to_cart') ; 
	Route::get('/remove_from_cart/{id}','remove_from_cart')->name('remove_from_cart');
});


Route::get('/destroy_session',function(){
        \Session::flush();
        return redirect()->back();
});

Route::group(['prefix' => 'admin'], function () {
	Voyager::routes();
});
