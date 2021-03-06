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

use App\Http\Controllers\DenunciaController;

Route::get('/', function () {
    return redirect('home/');
});

Route::get('/home', function () {
  return view('home');
});

// cadastro
Route::get('/cadastro', 'CadastroController@mostrar')->middleware('guest');



Route::get('/postagem/{cod_postagem}', 'PostagemController@mostrar');


Route::get('/postagem/{cod_postagem}/denunciar', 'DenunciaController@mostrar')->middleware('auth');
Route::post('/postagem/{cod_postagem}/denunciar', 'DenunciaController@fazerDenuncia')->middleware('auth');



Route::get('/postagem/{cod_postagem}/solicitar', 'SolicitacaoController@mostrar')->middleware('auth');

Route::post('/postagem/{cod_postagem}/solicitar', 'SolicitacaoController@solicitar');

Route::get('/postagem/{cod_postagem}/avaliar', function($cod_postagem){
  return view('avaliarPostagem', ['cod_postagem'=>$cod_postagem]);
});


Route::post('/postagem/{cod_postagem}/avaliar', 'SolicitacaoController@avaliar');


Route::get('lista', 'ListaController@mostrar');
Route::post('lista', 'ListaController@pesquisa');

Route::get('/admin', 'AdminController@mostrar' );
Route::get('/admin/excluir/{cod_postagem}', 'AdminController@excluir');
Route::get('/admin/restaurar/{cod_postagem}', 'AdminController@restaurar');


Route::get('/{cod_usuario}/postar', function($codUsuario){
  return view('postaAnimal',['codUsuario'=>$codUsuario]);

});

Route::get('/{cod_usuario}/solicitacoes', 'SolicitacaoController@mostrarPedidos');
Route::post('/{cod_usuario}/solicitacoes', 'SolicitacaoController@aceitarSolicitacao');



Route::get('/perfil/{cod_usuario}', 'PerfilController@mostrar');
Route::get('/perfil/{cod_usuario}/editar', 'PerfilController@editar');
Route::post('/perfil/{cod_usuario}/editar', 'PerfilController@inserirEdicao');
Route::post('/perfil/{cod_usuario}/excluir', 'PerfilController@excluirPerfil');



Route::get('teste', function () {
    return view('teste');
});

Route::post('/logar', 'UsuarioController@login')->name('logar')->middleware('guest');


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home')->middleware('guest');


