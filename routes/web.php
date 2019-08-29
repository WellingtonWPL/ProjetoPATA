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
// */

// redirecionamento para a home
Route::get('/', function () {
    return redirect('home/');
});

Route::get('/home', function () {
  return view('home');
});

// cadastro
Route::get('/cadastro', function(){
  return view('cadastrar');
})->middleware('guest');



Route::get('/postagem/{cod_postagem}', 'PostagemController@mostrar');


Route::get('/postagem/{cod_postagem}/denunciar', function($cod_postagem){
  return view('denunciaPostagem', ['cod_postagem'=> $cod_postagem]);
});

Route::get('/postagem/{cod_postagem}/solicitar', 'SolicitacaoController@mostrar');

Route::post('/postagem/{cod_postagem}/solicitar', 'SolicitacaoController@solicitar');



Route::get('lista', 'ListaController@mostrar');
Route::post('lista', 'ListaController@pesquisa');

Route::get('/admin', function(){
  return view('vizualizaDenunciaAdmin');

});


Route::get('/{cod_usuario}/postar', function($codUsuario){
  return view('postaAnimal',['codUsuario'=>$codUsuario]);

});

Route::get('/{cod_usuario}/solicitacoes', function($codUsuario){
  return view('visualizaPedidos',['codUsuario'=>$codUsuario]);

});

Route::get('/perfil/{cod_usuario}', 'PerfilController@mostrar');

Route::get('teste', function () {
    return view('teste');
});

Route::post('/logar', 'UsuarioController@login')->name('logar')->middleware('guest');


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home')->middleware('guest');
