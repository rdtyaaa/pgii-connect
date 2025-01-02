<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InterviewController;

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
    Route::get('/payment/{paymentType}', [PaymentController::class, 'detailPayment'])->name('payment');
    Route::post('/payment/{paymentType}', [PaymentController::class, 'storePayment'])->name('payment.store');
    Route::get('/document', [StudentController::class, 'indexDocument'])->name('document');
    Route::get('/final', [StudentController::class, 'final'])->name('final');
    Route::post('/student/store-document', [StudentController::class, 'storeDocument'])->name('students.store.documents');
    Route::get('/information', [StudentController::class, 'indexInformation'])->name('information');
});

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        // Menampilkan manajemen pengguna
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');

        Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');

        // Menampilkan laporan
        Route::get('/logs', [AdminController::class, 'logs'])->name('admin.logs');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

        Route::resource('users', UserController::class)->except(['show']);
        Route::post('users/{user}/give-access', [UserController::class, 'giveAccess'])->name('users.give-access');
    });

Route::middleware(['auth', 'interviewer'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('interviews', [InterviewController::class, 'index'])->name('interviews.index');
    Route::get('interviews/{interview}', [InterviewController::class, 'show'])->name('interviews.detail');
    Route::put('interviews/{interview}/status', [InterviewController::class, 'updateStatus'])->name('interviews.updateStatus');
});

require __DIR__ . '/auth.php';
