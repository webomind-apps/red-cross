<?php

use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\FinancialYearController;
use App\Http\Controllers\Admin\JrcExamPaymentController;
use App\Http\Controllers\Admin\MasterPriceController;
use App\Http\Controllers\Admin\PaymentDetailController;
use App\Http\Controllers\Admin\SchoolDataController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
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


Route::get('/data', [HomeController::class, 'data']);
Route::get('master_price_data', [HomeController::class, 'master_price_data']);

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('jrc-exam-form', [HomeController::class, 'jrc_exam_form'])->name('jrc-exam-form');

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::group(['middleware' => ['auth']], function () {
        Route::resource('users', UserController::class);
        Route::resource('master-price', MasterPriceController::class);
        Route::resource('financial-year', FinancialYearController::class);
        Route::resource('email-templates', EmailTemplateController::class);
        Route::resource('school-data', SchoolDataController::class);
        Route::get('export', [SchoolDataController::class, 'export'])->name('export');
        Route::post('import', [SchoolDataController::class, 'import'])->name('import');
        Route::resource('payment-details', PaymentDetailController::class);
        Route::resource('jrc-exam-payment-details', JrcExamPaymentController::class);
    });
});
