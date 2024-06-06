<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Route::middleware(['auth:sanctum','admin']) ->group(function(){
       /* Route::get('/user', function(Request $request){
            return $request->user();
        });*/
      /*  Route::get('/user',[AuthController::class, 'getUser']);
        Route::post('/logout',[AuthController::class, 'logout']);

        Route::apiResource('/product', [ProductController::class]);

    });*/
    Route::middleware(['auth:sanctum', 'admin'])->group(function () {
        Route::get('/user', [AuthController::class, 'getUser']);
        Route::post('/logout', [AuthController::class, 'logout']);
    
        // Use apiResource correctly
        Route::apiResource('/product', ProductController::class);
    });

Route::post('/login',[AuthController::class, 'login']);
