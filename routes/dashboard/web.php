<?php

use Illuminate\Support\Facades\Route;



Route::prefix('dashboard')->name('dashboard.')->group(function(){
    Route::get('/index', 'DashboardController@index')->name('dashboard.index');

});




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
