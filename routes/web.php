<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('appointments', 'App\Http\Controllers\AppointmentsController');
Route::post('/appointments/check', [App\Http\Controllers\AppointmentsController::class, 'checkAvailableSlots']);

Route::get('/invoices', [App\Http\Controllers\InvoicesController::class, 'index'])->name('invoices.index_user');
Route::get('/invoices/{invoice}', [App\Http\Controllers\InvoicesController::class, 'show'])->name('invoices.show_user');

Route::get('/reports', [App\Http\Controllers\ReportsController::class, 'index'])->name('reports.index_user');
Route::get('/reports/{report}', [App\Http\Controllers\ReportsController::class, 'show'])->name('reports.show_user');

Route::get('reports/print/{id}', [App\Http\Controllers\ReportsController::class, 'printReport'])->name('reports.print');

Route::prefix('admin')->group(function() {
    
    Route::get('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/', [App\Http\Controllers\TestsController::class, 'index']);

    Route::resource('tests', 'App\Http\Controllers\TestsController');

    Route::resource('slots', 'App\Http\Controllers\SlotsController');

    Route::resource('fields', 'App\Http\Controllers\FieldsController');

    Route::resource('appointments', 'App\Http\Controllers\AppointmentsController');

    Route::resource('samples', 'App\Http\Controllers\SamplesController');

    Route::resource('invoices', 'App\Http\Controllers\InvoicesController');

    Route::resource('reports', 'App\Http\Controllers\ReportsController');

    Route::resource('payments', 'App\Http\Controllers\PaymentsController');

});
