<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/student/store', [StudentController::class, 'store'])->name('students.store');
    Route::get('/student', function () {
        return view('student.personal-data');
    })->name('dashboard');
    Route::get('/payment', [PaymentController::class, 'detailPayment'])->name('payment');
    Route::post('/payment/store', [PaymentController::class, 'storePayment'])->name('payment.store');
});

Route::post('/payments/callback', [PaymentController::class, 'handleCallback']);

require __DIR__ . '/auth.php';
