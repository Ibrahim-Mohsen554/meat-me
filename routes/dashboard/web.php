<?php

use Illuminate\Support\Facades\Route;




Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

Route::prefix('dashboard')->name('dashboard.')->group(function(){


    Route::get('/index', 'DashboardController@index')->name('index');

});

});







// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
