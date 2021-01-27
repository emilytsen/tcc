<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
1° xamp2° CMD pasta tcc> php artisan serve 


|
*/

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ArtesanatoController;
use App\Http\Controllers\ListagemController;
    

Route::get('/', [HomeController::class, 'showView']);

Route::get('/catalogo', [CatalogoController::class, 'showView']);

Route::get('/produto', [ProdutoController::class, 'showView']);

Route::get('/login', [LoginController::class, 'showView']);
Route::post('/logar', [LoginController::class, 'logar']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/artesanatos/cadastrar', [ArtesanatoController::class, 'viewCadastro']);
    Route::post('/artesanatos/cadastrar', [ArtesanatoController::class, 'cadastrar']);
    Route::post('/artesanatos/editar', [ArtesanatoController::class, 'editar']);
    Route::get('/artesanatos/listagem', [ListagemController::class, 'showView']);
    Route::get('/artesanatos/excluir', [ArtesanatoController::class, 'excluir']);
});