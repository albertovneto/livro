<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LivroController,
    AssuntoController,
    AutorController,
    Reports\AutorController as AutorReportController,
};
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

Route::controller(LivroController::class)->group(function () {
    Route::get('livro', 'list');
    Route::get('livro/criar', 'create');
    Route::get('livro/{id}/editar', 'edit');
    Route::post('livro', 'insert');
    Route::put('livro/{id}', 'update');
    Route::delete('livro/{id}', 'delete');
});

Route::controller(AssuntoController::class)->group(function () {
    Route::get('assunto', 'list');
    Route::get('assunto/criar', 'create');
    Route::get('assunto/{id}/editar', 'edit');
    Route::post('assunto', 'insert');
    Route::put('assunto/{id}', 'update');
    Route::delete('assunto/{id}', 'delete');
});

Route::controller(AutorController::class)->group(function () {
    Route::get('autor', 'list');
    Route::get('autor/criar', 'create');
    Route::get('autor/{id}/editar', 'edit');
    Route::post('autor', 'insert');
    Route::put('autor/{id}', 'update');
    Route::delete('autor/{id}', 'delete');
});

Route::controller(AutorReportController::class)->group(function () {
    Route::get('reports/autor', 'autores');
});
