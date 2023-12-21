<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LivroController
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
