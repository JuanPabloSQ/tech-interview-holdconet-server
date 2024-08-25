<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StreetController;

Route::apiResource('regions', RegionController::class);
Route::get('provinces', [ProvinceController::class, 'index']); 
Route::get('cities', [CityController::class, 'index']);
Route::get('streets', [StreetController::class, 'index']);
