<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageFormController;

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
    session()->flush();
    return view('index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/manage-chart', [DashboardController::class, 'chart'])->middleware('auth');

Route::get('/dashboard/manage-form', [ManageFormController::class, 'index'])->middleware('auth');
Route::get('/dashboard/manage-form/show', [ManageFormController::class, 'show'])->middleware('auth');

// Create Question
Route::get('/dashboard/manage-form/{part:code}/create', [ManageFormController::class, 'create'])->middleware('auth');
Route::post('/dashboard/manage-form/{part:code}/create', [ManageFormController::class, 'storeQuestion'])->middleware('auth');

// Edit Question
Route::get('/dashboard/manage-form/{question:id}/edit', [ManageFormController::class, 'edit'])->middleware('auth');
Route::post('/dashboard/manage-form/{question:id}/edit', [ManageFormController::class, 'updateQuestion'])->middleware('auth');
Route::delete('/dashboard/manage-form/{question:id}', [ManageFormController::class, 'destroy'])->middleware('auth');

Route::middleware(['auth', 'checkInputType'])->group(function () {
    Route::get('/dashboard/manage-form/{question:id}/edit-options', [ManageFormController::class, 'editOptions']);
    Route::post('/dashboard/manage-form/{question:id}/edit-options', [ManageFormController::class, 'storeOptions']);
});


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

Route::get('/test123', [ManageFormController::class, 'test123']);