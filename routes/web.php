<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExpenseController;


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('vehicles', VehicleController::class);
    Route::resource('checkins', CheckinController::class);
    Route::resource('checkouts', CheckoutController::class);

    Route::post('/checkin', [CheckinController::class, 'store'])->name('checkin.store');

    // Check-Out Routes
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // Route::post('/trips', [TripController::class, 'store'])->name('trips.store');
    // Route::put('/trips/{id}', [TripController::class, 'update'])->name('trips.update');
    Route::get('generate-pdf', [ReportController::class, 'generatePDF']);
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');


Route::get('/download-report', [ReportController::class, 'downloadReport'])->name('report.download');


});

Route::get('/', function () {
    return view('auth.login');
});

require __DIR__.'/auth.php';





