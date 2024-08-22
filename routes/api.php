<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StreetController;

Route::apiResource('regions', RegionController::class);
Route::apiResource('provinces', ProvinceController::class);
Route::apiResource('cities', CityController::class);
Route::apiResource('streets', StreetController::class);
