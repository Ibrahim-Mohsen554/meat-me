<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;



require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
});


Route::get('/{page}', 'AdminController@index');
