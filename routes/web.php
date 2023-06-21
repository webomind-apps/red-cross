<?php

use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\CircularController;
use App\Http\Controllers\Admin\CollegeDataController;
use App\Http\Controllers\Admin\CollegeRegistrationController as AdminCollegeRegistrationController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\FinancialYearController;
use App\Http\Controllers\Admin\GeneralSecretaryController;
use App\Http\Controllers\Admin\JrcExamPaymentController;
use App\Http\Controllers\Admin\MasterPriceController;
use App\Http\Controllers\Admin\PaymentDetailController;
use App\Http\Controllers\Admin\SchoolDataController;
use App\Http\Controllers\Admin\SchoolRegistrationController as AdminSchoolRegistrationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\CollegeRegistrationController;
use App\Http\Controllers\Frontend\JrcExaminationController;
use App\Http\Controllers\Frontend\SchoolRegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\AdminUser;
use App\Models\Balance;
use App\Models\CollegeBalance;
use App\Models\CollegeData;
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


//school registration form
Route::get('previous-years-data', [HomeController::class, 'previous_years_data']);
Route::post('school-registration-payment', [SchoolRegistrationController::class, 'store'])->name('school-registration-payment.store');
Route::get('school-payment-page/{id}', [SchoolRegistrationController::class, 'payment'])->name('school-payment-page');
Route::get('school-payment-success', [SchoolRegistrationController::class, 'thank_you_page'])->name('school-payment-success');

//college registration form
Route::get('college-previous-years-data', [CollegeController::class, 'previous_years_data'])->name('college-previous-years-data');
Route::post('college-registration-payment', [CollegeRegistrationController::class, 'store'])->name('college-registration-payment.store');
Route::get('college-payment-page/{id}', [CollegeRegistrationController::class, 'payment'])->name('college-payment-page');
Route::get('college-payment-success', [CollegeRegistrationController::class, 'thank_you_page'])->name('college-payment-success');
Route::get('college-payment-fail', [CollegeRegistrationController::class, 'payment_fail'])->name('college-payment-fail');

//jrc examination form 
Route::post('jrc-examination-payment', [JrcExaminationController::class, 'store'])->name('jrc-examination-payment.store');
Route::get('jrc-exam-payment-page/{id}', [JrcExaminationController::class, 'payment'])->name('jrc-exam-payment-page');
Route::get('jrc-exam-payment-success', [JrcExaminationController::class, 'thank_you_page'])->name('jrc-exam-payment-success');


require __DIR__ . '/auth.php';

//school registration form
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('thank-you', [HomeController::class, 'thank_you_page'])->name('thank-you');
//jrc examination/programme
Route::get('jrc-exam-form', [HomeController::class, 'jrc_exam_form'])->name('jrc-exam-form');
Route::get('jrc-data', [JrcExaminationController::class, 'data'])->name('jrc-data');
Route::post('jrc-thank-you', [JrcExaminationController::class, 'jrc_thank_you_page'])->name('jrc-thank-you');
//college registration form
Route::get('college-registration-form', [CollegeRegistrationController::class, 'index'])->name('college-registration-form');
Route::get('/college-data', [CollegeRegistrationController::class, 'data']);
Route::post('/college-thank-you', [CollegeRegistrationController::class, 'thank_you_page'])->name('college-thank-you');
//payment failure
Route::get('payment-failed', [HomeController::class, 'payment_failed'])->name('payment-failed');
Route::get('circulars', [HomeController::class, 'circulars'])->name('circulars');
Route::get('application-guide', [HomeController::class, 'application_guide'])->name('application_guide');






// Route::get('/dashboard', function () {

//     $years = FinancialYear::all();

//     $total_schools = SchoolData::count();
//     $total_colleges = CollegeData::count();

//     $year = request()->year;

//     $current_year = FinancialYear::where('status', true)->first();

//     if (is_null($year)) {

//         $balance_amount = Balance::where('year_id', $current_year->id)->sum('balance');
//         $paid_amount = Balance::where('year_id', $current_year->id)->sum('amount_to_be_paid');
//         $total_schools_paid = Balance::where('year_id', $current_year->id)->where('balance', 0)->count('school_id');
//         $total_schools_paid_partially = Balance::where('year_id', $current_year->id)->where('balance', '>', 0)->count('school_id');
//         $total_schools_not_paid = $total_schools - $total_schools_paid - $total_schools_paid_partially;


//         $college_bal_amount = CollegeBalance::where('year_id', $current_year->id)->sum('balance');
//         $college_paid_amount = CollegeBalance::where('year_id', $current_year->id)->sum('amount_to_be_paid');
//         $total_colleges_paid = CollegeBalance::where('year_id', $current_year->id)->where('balance', 0)->count('college_id');
//         $total_colleges_paid_partially = CollegeBalance::where('year_id', $current_year->id)->where('balance', '>', 0)->count('college_id');
//         $total_colleges_not_paid = $total_colleges - $total_colleges_paid - $total_colleges_paid_partially;
//     } else {

//         $balance_amount = Balance::where('year_id', $year)->sum('balance');
//         $paid_amount = Balance::where('year_id', $year)->sum('amount_to_be_paid');
//         $total_schools_paid = Balance::where('year_id', $year)->where('balance', 0)->count();
//         $total_schools_paid_partially = Balance::where('year_id', $year)->where('balance', '>', 0)->count();
//         $total_schools_not_paid = $total_schools - $total_schools_paid - $total_schools_paid_partially;

//         $college_bal_amount = CollegeBalance::where('year_id', $year)->sum('balance');
//         $college_paid_amount = CollegeBalance::where('year_id', $year)->sum('amount_to_be_paid');
//         $total_colleges_paid = CollegeBalance::where('year_id', $year)->where('balance', 0)->count('college_id');
//         $total_colleges_paid_partially = CollegeBalance::where('year_id', $year)->where('balance', '>', 0)->count('college_id');
//         $total_colleges_not_paid = $total_colleges - $total_colleges_paid - $total_colleges_paid_partially;
//     }


//     return view('admin.dashboard.index', compact('total_schools_paid', 'total_schools_not_paid', 'paid_amount', 'balance_amount', 'total_schools_paid_partially', 'years', 'total_schools'));
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


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
        Route::post('send-bulk-mail', [SchoolDataController::class, 'send_bulk_mail'])->name('send-bulk-mail');
        Route::get('search', [SchoolDataController::class, 'search'])->name('search');
        Route::resource('school-registration-payment', AdminSchoolRegistrationController::class);
        Route::get('school-registration-export', [AdminSchoolRegistrationController::class, 'export'])->name('school-registration-export');
        Route::get('school-registration-payment/school_id/{id}/year_id/{year}', [AdminSchoolRegistrationController::class, 'show'])->name('school-registration-payment.show');
        Route::resource('jrc-exam-payment-details', JrcExamPaymentController::class);
        Route::get('show-college/{id}', [JrcExamPaymentController::class, 'school_show'])->name('jrc-exam-payment-details.show-college');
        // Route::get('college-data-export', [CollegeDataController::class, 'export'])->name('college-export');

        Route::resource('admins', AdminUsersController::class);
        Route::resource('general-secretary-signature', GeneralSecretaryController::class);
        Route::resource('circulars', CircularController::class);

        //College registration
        Route::resource('college-data', CollegeDataController::class);
        Route::post('college-data-import', [CollegeDataController::class, 'import'])->name('college-import');
        Route::get('college-data-export', [CollegeDataController::class, 'export'])->name('college-export');
        Route::post('college-send-bulk-mail', [CollegeDataController::class, 'send_bulk_mail'])->name('college-send-bulk-mail');
        Route::get('college-search', [CollegeDataController::class, 'search'])->name('college-search');

        Route::resource('college-registration-payment', AdminCollegeRegistrationController::class);
        Route::get('college-registration-export', [AdminCollegeRegistrationController::class, 'export'])->name('college-registration-export');
        Route::get('college-registration-payment/college_id/{id}/year_id/{year}', [AdminCollegeRegistrationController::class, 'show'])->name('college-registration-payment.show');
    });
});
