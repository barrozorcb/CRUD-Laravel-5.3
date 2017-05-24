<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Site\SiteController@index');

Route::get('/painel/produtos/tests', 'Painel\ProdutoController@tests');

Route::resource('/painel/produtos', 'Painel\ProdutoController');


