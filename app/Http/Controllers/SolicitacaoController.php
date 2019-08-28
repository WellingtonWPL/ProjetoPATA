<?php

namespace App\Http\Controllers;

use App\Solicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitacaoController extends Controller
{
    public function solicitar($cod_postagem){



        // dd($cod_postagem);
        $usuario =(Auth::user());
        // dd($usuario->cod_usuario);
        $solicitacao = new Solicitacao;

        $solicitacao->cod_usuario_solicitante = $usuario->cod_usuario;
        $solicitacao->cod_postagem = $cod_postagem;

        $solicitacao->save();




        return view('sucesso', ['msg'=> 'Solicitação realizada com sucesso :)']);
    }
}
