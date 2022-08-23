<?php

use App\Http\Controllers\Api\BrandsController;
use Illuminate\Http\Request;
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
    
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
