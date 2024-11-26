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
    return view('welcome');
});

Route::get('/login', function() {
    return view('login');
});

Route::get('bootstrap', function () {
    return view('layouts/dashboardBT');
});

Route::get('tailwind', function () {
    return view('layouts/dashboardTW');
});

Route::name('usuarios.')->prefix('usuarios')->group(function() {
    Route::get('/', function() { return view('users/index'); })->name('index');
    Route::get('registrar', function() { return view('users/create'); })->name('create');
});
//Route::get('usuarios', function () {{ return view('authentication/createRoles'); }});