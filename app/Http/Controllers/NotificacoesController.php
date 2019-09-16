<?php

namespace App\Http\Controllers;

use App\User;
use App\Especie;

use Illuminate\Http\Request;

class NotificacoesController extends Controller
{
    public function mostraNotificacoes($cod_usuario){
        $usuario = User::where('cod_usuario', $cod_usuario)->get();
        //$usuario = User::where('cod_usuario', $postagem->cod_usuario)->get();
        return view('notificacoes',  ['cod_usuario'=>$cod_usuario, 'usuario'=>$usuario]);
        //, compact('especiesusuario', ['postagem'=>$postagem]));
    }
}
