<?php

use App\Models\SMSApi;
use App\Models\Promodisers;
use Illuminate\Http\Request;
use App\Models\Storelocation;
use App\Models\ItemMasterlists;
use Illuminate\Routing\Controller;

use App\Http\Controllers\FileUpload;
use App\Http\Livewire\StoreDropdown;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\StoreComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\StoresComponent;
use App\Exports\ImportExportController;
use App\Http\Controllers\UserTableController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\StoreController;
use App\Http\Livewire\PromodisersComponent;
use App\Http\Controllers\CsvExportController;
use App\Http\Controllers\CsvImportController;
use App\Http\Controllers\StoreFileController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PromodiserController;
use App\Http\Controllers\UserAccesscontroller;
use Illuminate\Support\Facades\App\Models\Store;
use App\Http\Controllers\ItemMasterlistController;
use App\Http\Controllers\Promodiser_fileController;
use App\Http\Controllers\Store\PromodisersController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\SalesRepresentativeController;

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
})->name('home');

/**
 * Routing for All the Web Pages
 */
Route::middleware(['auth:sanctum', 'verified','accessPermission'])->get('/dashboard', function () {
    $user = Auth::user();
    
    if (!$user) {
        
        return redirect()->route('login');
    }
    
    $userRole = $user->UserRole;
    
    if ($userRole === 'Sales Representative') {
        return redirect()->route('index');
    } elseif ($userRole === 'Promo Merchandiser' || $userRole === 'Team Leader') {
        return view('welcome');
    } else {
        return view('dashboard');
    }
})->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'stores', 'as' => 'store.'], function () {
        Route::get('/', [StoreController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'promodisers', 'as' => 'promodisers.'], function () {
        Route::get('/', [PromodiserController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'test-upload', 'as' => 'test-upload.'], function () {
        Route::get('/', [FileUploadController::class, 'index'])->name('index');
        Route::post('/', [FileUploadController::class, 'upload'])->name('upload');
        Route::get('store', [FileUploadController::class, 'view']);
        Route::post('store', [FileUploadController::class, 'store'])->name('store');
    });
    Route::group(['prefix' => 'stores-upload', 'as' => 'stores-upload.'], function () {
        Route::get('/', [StoreFileController::class, 'index'])->name('index');
        Route::post('/', [StoreFileController::class, 'upload'])->name('upload');
        Route::get('store', [StoreFileController::class, 'view']);
        Route::post('store', [StoreFileController::class, 'store'])->name('store');
    });
    Route::group(['prefix' => 'promodisers-upload', 'as' => 'promodisers-upload.'], function () {
        Route::get('/', [Promodiser_fileController::class, 'index'])->name('index');
        Route::post('/', [Promodiser_fileController::class, 'upload'])->name('upload');
        Route::get('store', [Promodiser_fileController::class, 'view']);
        Route::post('store', [Promodiser_fileController::class, 'store'])->name('store');
    });
        // Route::resource('users',AdminUserController::class); 

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [UserTableController::class, 'index'])->name('index');
        Route::get('/create', [UserTableController::class, 'create'])->name('create');
        Route::post('/', [UserTableController::class, 'store'])->name('store');
        Route::get('/{user}', [UserTableController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserTableController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserTableController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'ess-api', 'as' => 'ess-api.'], function () {
        Route::get('/', [SMSController::class, 'index'])->name('index');
        Route::get('{smsapi}', [SMSController::class, 'show'])->name('show');
        Route::post('create', [SMSController::class, 'create'])->name('create');
    });
    Route::get('/sales/dashboard',[SalesRepresentativeController::class,'index'])->name('index'); 
    });

   
    
/**
 * Srore Dropdown Routing
 */
Route::get('getStorelocation/{Storelocations}', function ($Storelocations) {
    // return response()->json(App\Models\Storelocation::all());
    $Storelocations = App\Models\Storelocation::where('id',$Storelocations)->get();
    return response()->json(['locations' => $Storelocations]);
});
Route::get('getLocationCode/{LocationCode}', function ($LocationCode) {
    // return response()->json(App\Models\LocationCode::all());
    $LocationCode = App\Models\LocationCode::where('id',$LocationCode)->get();
    return response()->json(['locationcode' => $LocationCode]);
});
Route::get('getStoreGroup/{StoreGroup}', function ($StoreGroup) {
    // return response()->json(App\Models\LocationCode::all());
    $StoreGroup = App\Models\Storegroup::where('id',$StoreGroup)->get();
    return response()->json(['Group' => $StoreGroup]);
});
//Ending of Store drop-down

//Api Routes
Route::get('/token',function(){
    return csrf_token();
});





