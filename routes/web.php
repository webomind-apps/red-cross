<?php

use App\Http\Controllers\Admin\FinancialYearController;
use App\Http\Controllers\Admin\MasterPriceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/dashboard', function () {
//     return view('admin.dashboard.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->middleware(['auth', 'verified'])->name('dashboard');
    
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::group(['middleware' => ['auth']], function () {
        Route::resource('users', UserController::class);
        Route::resource('master-price', MasterPriceController::class);
        Route::resource('financial-year', FinancialYearController::class);
    });
});
