<?php

use App\Http\Controllers\Site\CarController;
use App\Http\Controllers\Site\CatalogController;
use App\Http\Controllers\Site\HomepageController;
use Illuminate\Support\Facades\Route;


Route::controller(HomepageController::class)->group(function () {
	Route::get('/', 'index')->name('index');
	Route::get('/wishlist','wishlist')->name('wishlist');
});
Route::controller(CarController::class)->name('car.')->prefix('car')->group(function () {
	Route::get('{car_model:slug}/{rental_item}', 'index')->name('index');
});
Route::controller(CatalogController::class)->name('catalog.')->group(function (){
	Route::get('/catalog','index')->name('index');
	Route::get('/premiums','premiums')->name('premiums');
});

Route::controller(\App\Http\Controllers\Site\FilterController::class)->name('filter.')->group(function () {
	Route::get('get-models}', 'getModels')->name('get-models');
});


Route::group(['prefix' => 'admin'], function () {
	Voyager::routes();
});
