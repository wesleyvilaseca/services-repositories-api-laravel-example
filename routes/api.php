<?php

use App\Http\Controllers\Api\BrandsController;
use App\Http\Controllers\Api\OptionController;
use App\Http\Controllers\Api\OptionValueDescriptionController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductOptionController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function () {

    /**
     * brands routes
     */

    Route::get('/brands', [BrandsController::class, 'index']);
    Route::get('/brands/{id}', [BrandsController::class, 'show']);
    Route::post('/brands', [BrandsController::class, 'store']);
    Route::post('/brands/{id}/edit', [BrandsController::class, 'update']);
    Route::post('/brands/{id}/remove', [BrandsController::class, 'delete']);


    /**
     * options
     */

    Route::get('/options', [OptionController::class, 'index']);
    Route::get('/options/{id}', [OptionController::class, 'show']);
    Route::post('/options', [OptionController::class, 'store']);
    Route::post('/options/{id}/edit', [OptionController::class, 'update']);
    Route::post('/options/{id}/remove', [OptionController::class, 'delete']);


     /**
     * product options
     */

    Route::get('/product-options/{productId}', [ProductOptionController::class, 'index']);
    Route::post('/product-options/{productId}/atach', [ProductOptionController::class, 'atachOptionProducts']);
    Route::post('/product-options/{productId}/detach', [ProductOptionController::class, 'detachOptionProducts']);

    /**
     * options value description
     */

    Route::get('/options-value', [OptionValueDescriptionController::class, 'index']);
    Route::get('/options-value/{id}', [OptionValueDescriptionController::class, 'show']);
    Route::post('/options-value', [OptionValueDescriptionController::class, 'store']);
    Route::post('/options-value/{id}/edit', [OptionValueDescriptionController::class, 'update']);
    Route::post('/options-value/{id}/remove', [OptionValueDescriptionController::class, 'delete']);

    /**
     * products
     */

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::post('/products/{id}/edit', [ProductController::class, 'update']);
    Route::post('/products/{id}/remove', [ProductController::class, 'delete']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
