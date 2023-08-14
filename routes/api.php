<?php

use App\Models\SMSApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\LoginAPIController;
use App\Http\Controllers\UserTableController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\GetPromodiserInfoAPI;

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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Api
Route::group(['prefix' => 'ess-api', 'as' => 'ess-api.'], function () {
    Route::get('/', [SMSController::class, 'index']);
    Route::get('{smsapi}', [SMSController::class, 'show']);
    Route::post('create', [SMSController::class, 'create']);
});

/**
 * Item Masterlist REST API Endpoint
 */
Route::group(['prefix' => 'test-upload', 'as' => 'test-upload.'], function () {
    Route::get('/', [FileUploadController::class, 'index'])->name('index');
    Route::post('/', [FileUploadController::class, 'upload'])->name('upload');
    Route::get('store', [FileUploadController::class, 'view']);
    Route::post('store', [FileUploadController::class, 'store'])->name('store');
});

/**
 * Store Location and Name Get Request Method
 */
Route::group(['prefix' => 'getFirstname', 'as' => 'getFirstname.'], function () {
    Route::get('/', [GetPromodiserInfoAPI::class, 'index'])->name('index');
    
});

/**
 * Login and Registration Request
 */
// Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
//     Route::get('/', [UserTableController::class, 'index'])->name('index');
//     Route::get('/create', [UserTableController::class, 'create'])->name('create');
//     Route::post('/', [UserTableController::class, 'store'])->name('store');
//     Route::get('/{user}', [UserTableController::class, 'edit'])->name('edit');
//     Route::put('/{user}', [UserTableController::class, 'update'])->name('update');
//     Route::delete('/{user}', [UserTableController::class, 'destroy'])->name('destroy');
// });
Route::post('/login', [LoginAPIController::class, 'login']);
Route::post('/register', [LoginAPIController::class, 'register']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/logout', [LoginAPIController::class, 'logout']);
    // Add your authenticated routes here
});

//Api Routes
Route::get('/token',function(){
    return csrf_token();
});



