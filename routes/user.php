<?php
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::controller(DashboardController::class)->name('user.')->group(function() {
    Route::get('user','index')->middleware('user')->name('cabinet');
    Route::get('user-profile','user_profile')->middleware('user')->name('user_profile');
    Route::get('user-elan','user_elan')->middleware('user')->name('user_elan');
    Route::get('user-password','user_password')->middleware('user')->name('user_password');
    Route::post('update_password','update_password')->name('update_password');
    Route::post('login','login')->name('login');
    Route::get('user-logout','logout')->name('logout');
    Route::post('update_profile','update_profile')->name('update_profile');
    Route::post('user_delete','user_delete')->name('user_delete');
    Route::post('forgot_password','forgot_password')->name('forgot_password');
    Route::get('password/reset/{token}','showresetform')->name('reset.password.form');

    




    });



