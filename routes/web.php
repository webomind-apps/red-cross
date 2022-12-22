<?php

use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\FinancialYearController;
use App\Http\Controllers\Admin\GeneralSecretaryController;
use App\Http\Controllers\Admin\JrcExamPaymentController;
use App\Http\Controllers\Admin\MasterPriceController;
use App\Http\Controllers\Admin\PaymentDetailController;
use App\Http\Controllers\Admin\SchoolDataController;
use App\Http\Controllers\Admin\SchoolRegistrationController as AdminSchoolRegistrationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\JrcExaminationController;
use App\Http\Controllers\Frontend\SchoolRegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\AdminUser;
use App\Models\Balance;
use App\Models\FinancialYear;
use App\Models\GeneralSecretarySignature;
use App\Models\JrcExaminationFee;
use App\Models\SchoolData;
use App\Models\SchoolRegistration;
use App\Models\SchoolRegistrationFee;
use Illuminate\Support\Facades\DB;
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
Route::get('/year', [HomeController::class, 'year']);
Route::get('master-price-data', [HomeController::class, 'master_price_data']);
Route::get('previous-years-data', [HomeController::class, 'previous_years_data']);
Route::post('school-registration-payment', [SchoolRegistrationController::class, 'store'])->name('school-registration-payment.store');
Route::post('jrc-examination-payment', [JrcExaminationController::class, 'store'])->name('jrc-examination-payment.store');
Route::get('payment-page', [SchoolRegistrationController::class, 'payment'])->name('payment-page');
Route::get('payment-success', [SchoolRegistrationController::class, 'payment_success'])->name('payment-success');
Route::get('invoice', [SchoolRegistrationController::class, 'invoice'])->name('invoice');

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('jrc-exam-form', [HomeController::class, 'jrc_exam_form'])->name('jrc-exam-form');
Route::get('thank-you', [HomeController::class, 'thank_you_page'])->name('thank-you');

Route::get('/dashboard', function () {
   
    $years = FinancialYear::all();

    $total_schools = SchoolData::count();

    $year = request()->year;
    if (is_null($year) ) {
        $current_year = FinancialYear::where('status', true)->first();
        $balance_amount = Balance::where('year_id', $current_year->id)->sum('balance');
        $paid_amount = Balance::where('year_id', $current_year->id)->sum('amount_to_be_paid');
    } else {
        $current_year = FinancialYear::where('status', true)->first();
        $balance_amount = Balance::where('year_id', $year)->sum('balance');
        $paid_amount = Balance::where('year_id', $year)->sum('amount_to_be_paid');
    }
        $total_schools_paid = Balance::where('year_id',$current_year->id)->where('balance', 0)->count('school_id');
        $total_schools_paid_partially = Balance::where('year_id',$current_year->id)->where('balance','>', 0)->count('school_id');
        $total_schools = SchoolData::count();
        $total_schools_not_paid = $total_schools - $total_schools_paid - $total_schools_paid_partially;
        
       
    return view('admin.dashboard.index', compact('total_schools_paid', 'total_schools_not_paid', 'paid_amount', 'balance_amount','total_schools_paid_partially','years','total_schools'));
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
        Route::resource('school-registration-payment', AdminSchoolRegistrationController::class);
        Route::get('school-registration-export', [AdminSchoolRegistrationController::class, 'export'])->name('school-registration-export');
        Route::get('school-registration-payment/school_id/{id}/year_id/{year}', [AdminSchoolRegistrationController::class, 'show'])->name('school-registration-payment.show');
        // Route::get('school-registration-payment/school_id/{id}/year_id/{year}', [AdminSchoolRegistrationController::class, 'destroy'])->name('school-registration-payment.destroy');
        // Route::get('school-registration-payment/school_id/{id}/year_id/{year}', [AdminSchoolRegistrationController::class, 'destroy'])->name('school-registration-payment.destroy');
        Route::resource('jrc-exam-payment-details', JrcExamPaymentController::class);
        Route::resource('admins', AdminUsersController::class);
        Route::resource('general-secretary-signature', GeneralSecretaryController::class);
    });
});


