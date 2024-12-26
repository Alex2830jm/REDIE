<?php

use App\Http\Controllers\CuadroEstadisticoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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



/* Route::get('/', function () {
    return view('index');
})->middleware(['auth'])->name('home'); */

Route::middleware(['custom.headers'])->group(function () {
    Route::get('/', [DashboardController::class, 'grupos' ])->middleware(['auth'])->name('home');
    Route::get('/sectores-grupo', [DashboardController::class, 'sectores'])->name('sectorsByGroup');
    Route::get('/temas-sector', [DashboardController::class, 'temas'])->name('temasBySector');
    Route::get('/cuadro-estadistico', [CuadroEstadisticoController::class, 'listCE'])->name('cuadrosEstadisticosByTema');
    Route::get('/archivos-ce', [DashboardController::class, 'archivosCE'])->name('archivosByCuadrosEstadisticos');
    Route::post('/store-ce', [CuadroEstadisticoController::class, 'store'])->name('saveCE');

    Route::prefix('index')->name('index.')->group( function ()  {
        Route::get('/', [DashboardController::class, 'grupos1' ])->middleware(['auth'])->name('home');
        Route::get('/sectores-grupo', [DashboardController::class, 'sectores1'])->name('sectorsByGroup');
        Route::get('/temas-sector', [DashboardController::class, 'temas1'])->name('temasBySector');
        Route::get('/cuadro-estadistico', [DashboardController::class, 'cuadroEstadistico'])->name('cuadrosEstadisticosByTema');
        Route::get('/archivos-ce', [DashboardController::class, 'archivosCE1'])->name('archivosByCuadrosEstadisticos');
    });
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
        Route::name('roles.')->prefix('roles')->group(function() {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/store', [RoleController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('edit');
            Route::put('/{id}/updated', [RoleController::class, 'update'])->name('update');
            Route::get('/{id}/delete', [RoleController::class, 'destroy'])->name('destroy');
            Route::get('/{id}/temas', [RoleController::class, 'temasByRole'])->name('temas');
        });
    
        Route::name('usuarios.')->prefix('usuarios')->group(function() {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/registrar', [ UserController::class, 'create'])->name('create');
            Route::post('/registrar', [ UserController::class, 'store'])->name('store');
            Route::get('/{id}/editar', [UserController::class, 'edit'])->name('edit');
            Route::put('/{id}/update',[UserController::class, 'update'])->name('update');
            Route::get('/{id}/eliminar', [UserController::class, 'destroy'])->name('destroy');
        });
    
        Route::get('sectores', function () { return view('grupos/sectores'); })->name('sectores.index');
    
    });
});


Route::get('/pruebas', [DashboardController::class, 'pruebas']);
require __DIR__.'/auth.php';
