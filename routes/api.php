<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

// API Routes for Product and Order
// Food Items Routes
Route::get('/food-items', [ProductController::class, 'index']);
Route::get('/food-items/{id}', [ProductController::class, 'show']); 

// Orders Routes
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{id}', [OrderController::class, 'show']); 
Route::post('/orders', [OrderController::class, 'store']); 
Route::put('/orders/{id}', [OrderController::class, 'update']);
Route::delete('/orders/{id}', [OrderController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::post('/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    return ['token' => $user->createToken('api-token')->plainTextToken];
});


Route::middleware('auth:sanctum')->get('/admin-panel', function (Request $request) {
    if ($request->user()->role === 'admin') {
        return response()->json(['message' => 'Welcome to the admin panel']);
    }

    return response()->json(['message' => 'Access denied'], 403);
});

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdersExport;

Route::get('/export-orders', function () {
    return Excel::download(new OrdersExport, 'orders.xlsx');
});

