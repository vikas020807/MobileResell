<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColourController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\RomController;
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
    return view('index');
});

Route::get('add-colour',[ColourController::class,'index'])->name('specs.colour');
Route::post('add-colour',[ColourController::class,'store'])->name('specs.colour.store');
Route::post('colour.update',[ColourController::class,'update'])->name('specs.colour.edit');
Route::get('colour.show/{id}', [ColourController::class, 'show'])->name('colour.show');
Route::get('colour.delete/{id}', [ColourController::class, 'delete'])->name('colour.delete');

Route::get('add-brand',[BrandController::class,'index'])->name('specs.brand');
Route::post('add-brand',[BrandController::class,'store'])->name('specs.brand.store');
Route::post('brand.update',[BrandController::class,'update'])->name('specs.brand.edit');
Route::get('brand.show/{id}', [BrandController::class, 'show'])->name('brand.show');
Route::get('brand.delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

Route::get('add-ram',[RamController::class,'index'])->name('specs.ram');
Route::post('add-ram',[RamController::class,'store'])->name('specs.ram.store');
Route::post('ram.update',[RamController::class,'update'])->name('specs.ram.edit');
Route::get('ram.show/{id}', [RamController::class, 'show'])->name('ram.show');
Route::get('ram.delete/{id}', [RamController::class, 'delete'])->name('ram.delete');


Route::get('add-rom',[RomController::class,'index'])->name('specs.rom');
Route::post('add-rom',[RomController::class,'store'])->name('specs.rom.store');
Route::post('rom.update',[RomController::class,'update'])->name('specs.rom.edit');
Route::get('rom.show/{id}', [RomController::class, 'show'])->name('rom.show');
Route::get('rom.delete/{id}', [RomController::class, 'delete'])->name('rom.delete');

