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

Route::middleware(['custom.headers', 'auth'])->group(function () {    
    Route::get('prueba', [DashboardController::class, 'prueba']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(CuadroEstadisticoController::class)->group(function() {
        Route::get('/', 'index' )->middleware(['auth'])->name('home');
        Route::get('/temas-sector', 'listTemas')->name('temasBySector');
        Route::get('/cuadro-estadistico/{ce}', 'listCE')->name('cuadrosEstadisticosByTema');
        Route::get('/cuadros-estadisticos-paginate/{tema}', 'listCEPaginate')->name('cuadrosEstadisticosByTemaPaginate');
        Route::post('/store-ce', 'storeCE')->name('saveCE');
        Route::get('/archivos-ce', 'listArchivosCE')->name('archivosByCuadrosEstadisticos');
        Route::post('/guardar-archivo', 'saveFile')->name('guardarArchivos');
        Route::get('/ver-archivo', 'viewFile')->name('verArchivo');
        Route::get('/descargar-archivo', 'downloadFileCE')->name('descargarArchivo');

        Route::prefix('archivos')->name('upload.')->group(function () {
            Route::view('/', 'upload/fileUpload')->name('index');
            Route::get('infoCuadroEstadistico', 'infoCuadroEstadistico')->name('infoCuadroEstadistico');
            Route::post('/store', 'storeFiles')->name('storeFiles');
        });
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

    Route::controller(DirectorioController::class)->group(function () {
        Route::prefix('dependencias')->name('dependencia.')->group(function () {
            Route::view('/', 'directorio/index')->name('home');
            Route::get('/dependencias', 'indexDependencias')->name('index');
            Route::get('nueva', 'storeDependencia')->name('create');
            Route::post('store', 'storeDependencia')->name('store');
            Route::post('/updateInfoDependencia', 'updateInfoDependencia')->name('update');
            Route::get('{id}/unidades', 'showDependencia')->name('listUnidades');
        });

        Route::prefix('unidades')->name('unidad.')->group(function () {
            Route::post('/{dependencia}/agregar', 'storeUnidad')->name('addUnidad');
            Route::get('/detalles', 'showInformantesUnidad')->name('show');
            Route::get('/edit', 'editUnidad')->name('edit');
            Route::get('/detallesInformante/{id}', 'showInformante')->name('showInformante');
            Route::get('/editInformante/{id}', 'editInformante')->name('editInformante');
            Route::post('/updateInformante', 'updateInformante')->name('updateInformante');
        });
    });
});


Route::get('/pruebas', [DashboardController::class, 'pruebas']);
require __DIR__.'/auth.php';
