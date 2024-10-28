<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TambonController;

Route::get('/provinces', [\App\Http\Controllers\API\TambonController::class, 'getProvinces']);
Route::get('/amphoes', [\App\Http\Controllers\API\TambonController::class, 'getAmphoes']);
Route::get('/tambons', [\App\Http\Controllers\API\TambonController::class, 'getTambons']);
Route::get('/zipcodes', [\App\Http\Controllers\API\TambonController::class, 'getZipcodes']);
