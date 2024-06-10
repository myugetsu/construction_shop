<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemFeedbackController;

Route::resources([
    'users' => UserController::class,
    'item-categories' => ItemCategoryController::class,
    'items' => ItemController::class,
    'item-feedbacks' => ItemFeedbackController::class,
]);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
