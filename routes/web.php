<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RubricController;
use App\Http\Controllers\SubRubricController;
use App\Http\Controllers\WarrantyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'files', 'as' => 'files.'], function () {
	Route::post('upload', [FileController::class, 'upload'])->name('upload');
});

Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
	Route::post('import', [ProductController::class, 'import'])->name('import');
});

Route::group(['prefix' => 'import', 'as' => 'import.'], function () {
	Route::post('rubrics', [RubricController::class, 'import'])->name('rubrics');
	Route::post('sub-rubrics', [SubRubricController::class, 'import'])->name('sub_rubrics');
	Route::post('product-categories', [ProductCategoryController::class, 'import'])->name('product-categories');
	Route::post('manufacturers', [ManufacturerController::class, 'import'])->name('manufacturers');
	Route::post('warranties', [WarrantyController::class, 'import'])->name('warranties');
});