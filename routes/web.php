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

Route::get('/', function () {
  return view('home');
});


Route::get('/cadastro', function(){
  return view('cadastrar');
});

Route::get('/postagem/{cod_postagem}', function($cod_postagem){
  return view('postagemAnimal', ['cod_postagem'=> $cod_postagem]);
});


Route::get('/postagem/{cod_postagem}/denunciar', function($cod_postagem){
  return view('denunciaPostagem', ['cod_postagem'=> $cod_postagem]);
});
Route::get('/postagem/{cod_postagem}/solicitar', function($cod_postagem){
  return view('solicitacaoPostagem', ['cod_postagem'=> $cod_postagem]);
});


Route::get('lista', function(){
  return view('listaAnimais');

});

Route::get('/admin', function(){
  return view('vizualizaDenunciaAdmin');

});

Route::get('/{cod_usuario}/postar', function($codUsuario){
  return view('postaAnimal',['codUsuario'=>$codUsuario]);

});

Route::get('/{cod_usuario}/solicitacoes', function($codUsuario){
  return view('visualizaPedidos',['codUsuario'=>$codUsuario]);

});

Route::get('/perfil', function(){
    return view('perfilUsuario');

});

Auth::routes();


Route::get('/entrar', 'HomeController@index')->name('home');
