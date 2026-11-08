<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdenservicioController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('ordenservicio', OrdenservicioController::class);
