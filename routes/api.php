<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductBrandsController;
use App\Http\Controllers\ProviderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post( 'login', [AuthController::class, 'login'] );

/*
 * Protected routes
*/

// Products
Route::apiResource( 'products', ProductController::class )->middleware( 'auth:api' );

// Product Types
Route::apiResource( 'product_types', ProductTypeController::class )->middleware( 'auth:api' );

// Product Brands
Route::apiResource( 'product_brands', ProductBrandsController::class )->middleware( 'auth:api' );

Route::apiResource( 'providers', ProviderController::class )->middleware( 'auth:api' );
