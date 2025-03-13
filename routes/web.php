<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function (Request $request) {
    return response()->json(['message' => 'Unauthorized'], 401);
})->name('login');