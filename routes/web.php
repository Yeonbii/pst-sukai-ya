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

Route::get('/dashboard/manage-form', function () {
    return view('dashboard.manage-forms.index');
});

Route::get('/dashboard/manage-form/create', function () {
    return view('dashboard.manage-forms.create');
});

Route::get('/form', function () {
    return view('forms.index');
});