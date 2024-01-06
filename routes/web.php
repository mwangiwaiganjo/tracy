<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/profile', function () {
    return view('user');
});

Route::get("/auth/login" , [AuthController::class , "renderLoginPage"]);
Route::post("/auth/login" , [AuthController::class , "loginStore"]);
Route::post("/auth/signup" , [AuthController::class , "signup"]);
Route::get("/auth/logout" , [AuthController::class , "logout"]);

// leave Form
Route::get("/leave" , [LeaveController::class , "index"]);


// department
Route::controller(DepartmentController::class)->group(function(){
    Route::prefix('department')->group(function(){
        Route::post('' , 'store');
    });
});
