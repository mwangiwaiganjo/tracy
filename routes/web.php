<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Mail\LeaveMail;
use Illuminate\Support\Facades\Mail;
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
    return view('user');
})->middleware(['auth' => 'auth']);

Route::get("/admin" , function(){
    return view('admin.index');
});

// Route::get("/mail" , function(){
//     Mail::to("edwardkabwoy@gmail.com")->send(new LeaveMail("dward" , 'kaboi' , '4'));
// });


Route::get("/auth/login" , [AuthController::class , "renderLoginPage"])->name('login');
Route::get("/auth/register" , [AuthController::class , "register"]);
Route::post("/auth/login" , [AuthController::class , "loginStore"]);
Route::post("/auth/signup" , [AuthController::class , "signup"]);
Route::get("/auth/logout" , [AuthController::class , "logout"]);

// leave Form
Route::get("/leave" , [LeaveController::class , "index"])->middleware(['auth' => 'auth']);
Route::post("/leave" , [LeaveController::class , "store"])->middleware(['auth' => 'auth']);


// department
Route::controller(DepartmentController::class)->group(function(){
    Route::prefix('department')->group(function(){
        Route::post('' , 'store');
    });
});

//employees

Route::controller(EmployeeController::class)->group(function(){
    Route::prefix('employees')->group(function(){
        Route::post('' , 'store');
    });
})->middleware(['auth' => 'auth']);
