<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CommonPath;
use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyUser;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/appointment', function () {
    return view('appointment');
});

Route::get('/appointmentpdf', function () {
    return view('appointmentpdf');
});

// Route::get('/applist', function () {
//     return view('admin.appointment-list');
// });

Route::get('/pdf', [PdfController::class, 'index']);

Route::post('/take-appointment', [AppointmentController::class, 'store'])->name('medical.list');
Route::get('appointment-pdf/{id}', [AppointmentController::class, 'index']);//Dekte hobe

Route::middleware('auth',OnlyAdmin::class)->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('medicals', MedicalController::class);

    Route::get('usr/list', [ListController::class, 'userlist'])->name('user.list');

    Route::get('edit-adminprofile/{id}', [UserController::class, 'editAdmin']);
    Route::post('update-adminprofile/{id}', [UserController::class, 'updateAdmin']);

});
Route::middleware('auth',OnlyUser::class)->group(function () {
    Route::get('user/home', [UserController::class, 'firtPath']);
    Route::get('edit-userprofile/{id}', [UserController::class, 'editUser']);
    Route::post('update-userprofile/{id}', [UserController::class, 'updateUser']);

});

Route::middleware('auth',CommonPath::class)->group(function () {
    Route::get('appointment-list/{id}', [AppointmentController::class, 'appointList']);
    Route::get('appointment/list', [ListController::class, 'appointmenlist'])->name('appointment.list');
    Route::get('medi/list', [ListController::class, 'medicalList'])->name('medical.list');
});

Route::get('report-entry/{id}', 'ReportController@reportView');
Route::post('report-store/{appointment_id}', 'ReportController@reportStore');
Route::get('reports/list', 'ReportController@reportList');
Route::get('report-list', 'ReportController@reportListAPI');
Route::get('report-edit/{id}', 'ReportController@reportedit');
Route::get('report-view/{id}', 'ReportController@reportViewPage');
Route::post('report-update/{id}', 'ReportController@reportUpdate');


require __DIR__.'/auth.php';
