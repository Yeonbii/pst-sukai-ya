<?php

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/dashboard/manage-chart', function () {
    return view('dashboard.manage-chart');
});

Route::get('/dashboard/manage-form', function () {
    return view('dashboard.manage-forms.index');
});

Route::get('/dashboard/manage-form/show', function () {
    return view('dashboard.manage-forms.show');
});

Route::get('/dashboard/manage-form/create', function () {
    return view('dashboard.manage-forms.create');
});

Route::get('/dashboard/manage-form/selection', function() {
    return view('dashboard.manage-forms.selection');
});

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