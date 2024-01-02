<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageFormController;
use App\Http\Controllers\DataRespondenController;

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

// Route untuk halaman utama
Route::get('/', function () {
    // Membersihkan sesi sebelum menampilkan halaman utama
    session()->forget([
        'form_i', 'form_s', 'form_sv', 'form_sr', 'form_f', 'form_o', 'form_done'
    ]);

    // Kontak yang dapat dihubungi
    $email_1 = 'bps6308@bps.go.id';
    $email_2 = 'bps6308@gmail.com';
    $no_wa = '6281917075877';
    $no_telp = '0527 61049';

    return view('index', [
        'email_1' => $email_1,
        'email_2' => $email_2,
        'no_wa' => $no_wa,
        'no_telp' => $no_telp
    ]);
});

// Autentikasi login dan logout
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/manage-chart', [DashboardController::class, 'chart']);
    Route::get('/dashboard/manage-chart/{chart:id}/change-show', [DashboardController::class, 'changeShow']);
    Route::get('/dashboard/manage-chart/{chart:id}/edit', [DashboardController::class, 'edit']);
    Route::post('/dashboard/manage-chart/{chart:id}/edit', [DashboardController::class, 'update']);
    Route::delete('/dashboard/manage-chart/{chart:id}', [DashboardController::class, 'destroy']);

    Route::get('/dashboard/manage-form', [ManageFormController::class, 'index']);
    Route::get('/dashboard/manage-form/show', [ManageFormController::class, 'show']);
    
    // Buat Pertanyaan
    Route::get('/dashboard/manage-form/{part:code}/create', [ManageFormController::class, 'create']);
    Route::post('/dashboard/manage-form/{part:code}/create', [ManageFormController::class, 'storeQuestion']);

    // Edit Pertanyaan
    Route::get('/dashboard/manage-form/{question:id}/edit', [ManageFormController::class, 'edit']);
    Route::post('/dashboard/manage-form/{question:id}/edit', [ManageFormController::class, 'updateQuestion']);
    Route::delete('/dashboard/manage-form/{question:id}', [ManageFormController::class, 'destroy']);

    // Edit Options Khusus Untuk Input Type Tertentu saja
    Route::middleware(['checkInputType'])->group(function () {
        Route::get('/dashboard/manage-form/{question:id}/edit-options', [ManageFormController::class, 'editOptions']);
        Route::post('/dashboard/manage-form/{question:id}/edit-options', [ManageFormController::class, 'storeOptions']);
    });

    Route::get('/dashboard/data-responden', [DataRespondenController::class, 'index']);
    Route::post('/dashboard/data-responden', [DataRespondenController::class, 'readAll']);
    Route::get('/dashboard/data-responden/{responden:id}/show', [DataRespondenController::class, 'show']);
    Route::delete('/dashboard/data-responden/{responden:id}', [DataRespondenController::class, 'destroy']);

    Route::get('/dashboard/archive', [ArchiveController::class, 'index']);
    Route::post('/dashboard/archive', [ArchiveController::class, 'destroyAll']);
    Route::delete('/dashboard/archive/{archive:id}', [ArchiveController::class, 'destroy']);

    Route::get('/download-data-responden', [DataRespondenController::class, 'export']);
});

// Form pengisian
Route::get('/form', [FormController::class, 'index']);
Route::get('/form/i', [FormController::class, 'formIdentity']);
Route::post('/form/i', [FormController::class, 'storeIdentity']);
Route::get('/form/s', [FormController::class, 'formService']);
Route::post('/form/s', [FormController::class, 'storeService']);
Route::get('/form/sv', [FormController::class, 'formServiceValue']);
Route::post('/form/sv', [FormController::class, 'storeServiceValue']);
Route::get('/form/sr', [FormController::class, 'formServiceRate']);
Route::post('/form/sr', [FormController::class, 'storeServiceRate']);
Route::get('/form/f', [FormController::class, 'formFeedback']);
Route::post('/form/f', [FormController::class, 'storeFeedback']);
Route::get('/form/o', [FormController::class, 'formOthers']);
Route::post('/form/o', [FormController::class, 'storeOthers']);
Route::get('/form/confirm', [FormController::class, 'confirm']);
Route::post('/form/confirm', [FormController::class, 'storeConfirm']);
Route::get('/form/done', [FormController::class, 'done']);