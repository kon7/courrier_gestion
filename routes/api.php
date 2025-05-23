<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\DocumentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user/profile', [AuthController::class, 'profile']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::get('/users', [AuthController::class, 'getUsers']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('courriers', CourrierController::class);
    Route::apiResource('documents', DocumentController::class);
    Route::get('/accessible-documents', [DocumentController::class, 'accessibleDocuments']);
    Route::post('/documents/{document}/share', [DocumentController::class, 'share']);
    Route::get('/documents/{document}/shared-users', [DocumentController::class, 'sharedUsers']);
});