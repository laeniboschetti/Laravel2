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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['middleware' => 'web'],function () {
    
Route::get('/produtos', 'ProdutosController@index');
Route::get('/produtos/novo', 'ProdutosController@novo');
Route::post('/produtos/salvar', 'ProdutosController@salvar');
Route::get('/produtos/{produto}/editar', 'ProdutosController@editar');
Route::patch('/produtos/{produto}', 'ProdutosController@atualizar');
Route::delete('/produtos/{produto}', 'ProdutosController@deletar'); 
//Route::get('/produtos/consultagrupos', 'ProdutosController@consultagrupos');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
    
});
