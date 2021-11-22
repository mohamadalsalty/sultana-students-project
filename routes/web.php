<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AgeController;
use App\Models\Classe;
use App\Models\Country;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[AgeController::class, 'index']); 

/**
 * Countries
 */
Route::prefix('countries')->group(function () {
    Route::get('create', [CountryController::class, 'create']);
    Route::post('store', [CountryController::class, 'store']);
    Route::get('index', [CountryController::class, 'index']);
    Route::get('show/{id}', [CountryController::class, 'show']);
    Route::get('edit/{id}', [CountryController::class, 'edit']);
    Route::put('update/{id}', [CountryController::class, 'update']);
    Route::post('/delete/{id}', [CountryController::class, 'destroy']);
});

/**
 * Students
 */
Route::prefix('students')->group(function () {
    Route::get('create', [StudentController::class, 'create']);
    Route::post('store', [StudentController::class, 'store']);
    Route::get('index', [StudentController::class, 'index']);
    Route::get('show/{id}', [StudentController::class, 'show']);
    Route::get('edit/{id}', [StudentController::class, 'edit']);
    Route::put('update/{id}', [StudentController::class, 'update']);
    Route::post('/delete/{id}', [StudentController::class, 'destroy']);
});

/**
 * Classes
 */
Route::prefix('classes')->group(function () {
    Route::get('create', [ClassController::class, 'create']);
    Route::post('store', [ClassController::class, 'store']);
    Route::get('index', [ClassController::class, 'index']);
    Route::get('show/{id}', [ClassController::class, 'show']);
    Route::get('edit/{id}', [ClassController::class, 'edit']);
    Route::put('update/{id}', [ClassController::class, 'update']);
    Route::post('/delete/{id}', [ClassController::class, 'destroy']);
});