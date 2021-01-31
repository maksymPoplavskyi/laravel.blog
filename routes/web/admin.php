<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::get('/', [DashboardController::class, 'index']);

Route::prefix('/categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');

    Route::get('/edit/{category_id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/update/{category_id}', [CategoryController::class, 'update'])->name('categories.update');

    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/delete/{category_id}', [CategoryController::class, 'delete'])->name('categories.delete');
});
