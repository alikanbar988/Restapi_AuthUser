<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\paymentmethodController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('user',UserController::class);
// Route::post("login",[AuthController::class,'Login']);
// Route::post("register", [AuthController::class, 'Register'])->name('register');
Route::resource('payment',paymentmethodController::class);
Route::post('register', 'App\Http\Controllers\API\AuthController@register' );  
Route::get('register', 'App\Http\Controllers\API\AuthController@register' );  // user registration
Route::post('login', 'App\Http\Controllers\API\AuthController@login' )->name('login'); 
Route::get('login', 'App\Http\Controllers\API\AuthController@login' )->name('login');  // user login
Route::group(['middleware' => ['auth:api']], function(){
    Route::post('logout','App\Http\Controllers\API\AuthController@Logout')->name('logout'); //
//Route::get('login','App\Http\Controllers\API\AuthController@login');
//Route::post('login','App\Http\Controllers\API\AuthController@login');
}
);

// Route::group([ 'prefix'=>'v1'],function() {
    
// });