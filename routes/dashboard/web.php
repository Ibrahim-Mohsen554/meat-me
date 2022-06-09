<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;




Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])-> group(function(){
    Route::get('/index', 'DashboardController@index')->name('index');

    // Users Routes
    Route::resource('users', 'UserController')->except(['show']);

});

});







// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
