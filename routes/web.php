<?php

use App\Http\Controllers\CuadroEstadisticoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DirectorioController;
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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
    
    
    Route::view('prueba', 'pruebas');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(CuadroEstadisticoController::class)->group(function() {
        Route::get('/', 'listGrupos' )->middleware(['auth'])->name('home');
        Route::get('/sectores-grupo', 'listSectores')->name('sectorsByGroup')->middleware(['auth']);
        Route::get('/temas-sector', 'listTemas')->name('temasBySector');
        Route::get('/cuadro-estadistico', 'listCE')->name('cuadrosEstadisticosByTema');
        Route::post('/store-ce', 'storeCE')->name('saveCE');
        Route::get('/archivos-ce', 'listArchivosCE')->name('archivosByCuadrosEstadisticos');
        Route::get('/info-ce', 'infoCE')->name('infoCE');
        Route::post('/guardar-archivo', 'saveArchives')->name('guardarArchivos');
        Route::get('/descargar-archivo', 'downloadFileCE')->name('descargarArchivo');
    });
    
    Route::prefix('roles')->controller(RoleController::class)->name('roles.')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/updated', 'update')->name('update');
        Route::post('delete', 'destroy')->name('delete');
        Route::get('/temas', 'temasByRole')->name('temas');
    });
    
    Route::prefix('usuarios')->controller(UserController::class)->name('usuarios.')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/registrar', 'create')->name('create');
        Route::post('/registrar', 'store')->name('store');
        Route::get('/{id}/editar', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::post('/eliminar', 'destroy')->name('delete');
    });

    Route::prefix('directorio')->controller(DirectorioController::class)->name('directorio.')->group(function () {
        Route::view('/', 'directorio/index')->name('index');
        Route::get('/dependencias', 'listDependencias')->name('dependencias');
        Route::get('{id}/unidades', 'listUnidades')->name('unidades');
        Route::get('/infoPersonas', 'infoPersonas')->name('infoPersonas');

        Route::get('dependecia/nueva', 'create')->name('dependenciaNueva');
        Route::post('dependencia/store', 'store')->name('dependenciaStore');
    });
})->middleware(['auth']);


/* Route::prefix('index')->name('index.')->group( function ()  {
        Route::get('/', [DashboardController::class, 'grupos1' ])->middleware(['auth'])->name('home');
        Route::get('/sectores-grupo', [DashboardController::class, 'sectores1'])->name('sectorsByGroup');
        Route::get('/temas-sector', [DashboardController::class, 'temas1'])->name('temasBySector');
        Route::get('/cuadro-estadistico', [DashboardController::class, 'cuadroEstadistico'])->name('cuadrosEstadisticosByTema');
        Route::get('/archivos-ce', [DashboardController::class, 'archivosCE1'])->name('archivosByCuadrosEstadisticos');
    }); */


Route::get('/pruebas', [DashboardController::class, 'pruebas']);
require __DIR__.'/auth.php';
