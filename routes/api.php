<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/cart', [CartController::class, 'index']);
  Route::post('/products', [ProductController::class, 'store']);
  Route::get('/products/{id}', [ProductController::class, 'showsingleProduct']);
  Route::put('/products/{id}', [ProductController::class, 'update']);
  Route::delete('/products/{id}', [ProductController::class, 'destroy']);
  Route::post('/cart', [CartController::class, 'addToCart']);
  Route::delete('/cart/{id}', [CartController::class, 'removeFromCart']);
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::get('/user' , [AuthController::class , 'showUser']);
});


Route::get('/test', function () {
  return response()->json(['message' => 'API is working!']);
});
