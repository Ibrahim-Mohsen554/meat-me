<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\DashboardController;




require __DIR__.'/auth.php';
Route::get('/', function () {
    return redirect()->route('dashboard.index');
});


// Auth::Routes(['register'=>false]);
Route::get('/{page}', 'AdminController@index');
