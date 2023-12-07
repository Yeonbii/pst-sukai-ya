<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageFormController;
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
    return view('index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/manage-chart', [DashboardController::class, 'chart'])->middleware('auth');

Route::get('/dashboard/manage-form', [ManageFormController::class, 'index'])->middleware('auth');
Route::get('/dashboard/manage-form/show', [ManageFormController::class, 'show'])->middleware('auth');

Route::get('/dashboard/manage-form/create/{part:code}', [ManageFormController::class, 'create'])->middleware('auth');
Route::post('/dashboard/manage-form/create/{part:code}', [ManageFormController::class, 'storeQuestion'])->name('storeQuestion')->middleware('auth');

Route::get('/dashboard/manage-form/selection', [ManageFormController::class, 'selection'])->middleware('auth');


Route::get('/form', function () {
    return view('forms.index');
});

Route::get('/form/identity', function () {
    return view('forms.questions.identity');
});

Route::get('/form/service', function () {
    return view('forms.questions.service');
});

Route::get('/form/service-value', function () {
    return view('forms.questions.service-value');
});

Route::get('/form/service-rate', function () {
    return view('forms.questions.service-rate');
});

Route::get('/form/feedback', function() {
    return view('forms.questions.feedback');
});

Route::get('/form/others', function() {
    return view('forms.questions.others');
});

Route::get('/form/confirm', function() {
    return view('forms.questions.confirm');
});