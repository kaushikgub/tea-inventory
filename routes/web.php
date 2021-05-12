<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'attemptLogin']);

Route::group(['middleware' => 'auth'], function (){
    Route::get('/', [DashboardController::class, 'index']);

    Route::group(['prefix' => '/brands'], function (){
        Route::get('/', [BrandController::class, 'index']);
        Route::get('/create', [BrandController::class, 'create']);
        Route::post('/store', [BrandController::class, 'store']);
        Route::get('{id}/edit', [BrandController::class, 'edit']);
        Route::put('{id}', [BrandController::class, 'update']);
        Route::get('{id}/delete', [BrandController::class, 'destroy']);
    });

    Route::group(['prefix' => '/inventories'], function (){
        Route::get('/', [InventoryController::class, 'index']);
        Route::get('/create', [InventoryController::class, 'create']);
        Route::post('/store', [InventoryController::class, 'store']);
        Route::get('{id}/edit', [InventoryController::class, 'edit']);
        Route::put('{id}', [InventoryController::class, 'update']);
        Route::get('{id}/delete', [InventoryController::class, 'destroy']);
    });

    Route::group(['prefix' => '/sales'], function (){
        Route::get('/', [SaleController::class, 'index']);
        Route::get('/create', [SaleController::class, 'create']);
        Route::post('/store', [SaleController::class, 'store']);
        Route::get('{id}/edit', [SaleController::class, 'edit']);
        Route::put('{id}', [SaleController::class, 'update']);
        Route::get('{id}/delete', [SaleController::class, 'destroy']);
    });
});
