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

Route::get('/postagem/{cod_postagem}/avaliar_doador', function($cod_postagem){
  return view('avaliarPostagem', ['cod_postagem'=>$cod_postagem, 'avaliado'=>'doador']);
});


Route::post('/postagem/{cod_postagem}/avaliar_doador', 'SolicitacaoController@avaliarDoador');

Route::get('/postagem/{cod_postagem}/avaliar_adotante', function($cod_postagem){
    return view('avaliarPostagem', ['cod_postagem'=>$cod_postagem, 'avaliado'=>'adotante']);
  });


  Route::post('/postagem/{cod_postagem}/avaliar_adotante', 'SolicitacaoController@avaliarAdotante');




Route::get('lista', 'ListaController@mostrar');
Route::post('lista/{pagina}', 'ListaController@pesquisa');
Route::get('lista/{pagina}', 'ListaController@mostrarPagina');
Route::post('lista_filtro/{pagina}', "ListaController@listaFiltro");
// Route::post('lista', 'ListaController@pesquisa');



Route::get('/admin', 'AdminController@mostrar' )->middleware('admin');
Route::get('/admin/excluir/{cod_postagem}', 'AdminController@excluir')->middleware('admin');
Route::get('/admin/restaurar/{cod_postagem}', 'AdminController@restaurar')->middleware('admin');


Route::get('/{cod_usuario}/postar', 'PostagemController@novaPostagem');


Route::get('crop-image', 'ImageController@index');
Route::post('crop-image', ['as'=>'upload.image','uses'=>'ImageController@uploadImage']);


Route::get('/{cod_usuario}/solicitacoes', 'SolicitacaoController@mostrarPedidos');
Route::post('/{cod_usuario}/solicitacoes', 'SolicitacaoController@aceitarSolicitacao');


Route::get('/perfil/{cod_usuario}', 'PerfilController@mostrar');
Route::get('/perfil/{cod_usuario}/editar', 'PerfilController@editar');
Route::post('/perfil/{cod_usuario}/editar', 'PerfilController@inserirEdicao');
Route::post('/perfil/{cod_usuario}/excluir', 'PerfilController@excluirPerfil');

Route::get('/{cod_usuario}/notificacoes', 'NotificacoesController@mostraNotificacoes')->middleware('auth');


Route::post('/salvaPost', 'PostagemController@inserirPostagem')->name('salvaPost');


Route::get('teste', function () {
    return view('teste');
});

Route::post('/sair', 'UsuarioController@loggedOut')->name('sair');

Route::post('/logar', 'UsuarioController@login')->name('logar')->middleware('guest');


Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home')->middleware('guest');


