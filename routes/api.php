<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StreetController;

Route::apiResource('regions', RegionController::class);
Route::apiResource('streets', StreetController::class);
Route::apiResource('provinces', ProvinceController::class);
Route::apiResource('cities', CityController::class);

Route::get('provinces', [ProvinceController::class, 'index']); 
Route::get('cities', [CityController::class, 'index']);
Route::get('streets', [StreetController::class, 'index']);

Route::post('provinces', [ProvinceController::class, 'store']);
Route::post('cities', [CityController::class, 'store']);
Route::post('streets', [StreetController::class, 'store']);

Route::put('provinces/{id}', [ProvinceController::class, 'update']);
Route::put('cities/{id}', [CityController::class, 'update']);
Route::put('streets/{id}', [StreetController::class, 'update']);

Route::delete('provinces/{id}', [ProvinceController::class, 'destroy']);
Route::delete('cities/{id}', [CityController::class, 'destroy']);
Route::delete('streets/{id}', [StreetController::class, 'destroy']);
