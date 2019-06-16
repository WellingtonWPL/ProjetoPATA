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

Route::get('/entrar', function () {
    return view('loginUsuario');
});

Route::get('/cadastro', function(){
    return view('criarContaUsuario');
});

Route::get('/postagem/{cod_postagem}', function($cod_postagem){
    return view('postagemAnimal', ['cod_postagem'=> $cod_postagem]);
});

Route::get('lista', function(){
    return view('listaAnimais');

});

Route::get('/admin', function(){
    return view('vizualizaDenunciaAdmin');

});