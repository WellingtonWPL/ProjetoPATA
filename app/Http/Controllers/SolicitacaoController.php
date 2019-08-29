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

    public function mostrar($cod_postagem){
        $postagem = \DB::table('Postagem_do_animal')
        ->where('cod_postagem', $cod_postagem)
        ->join('Porte', 'Postagem_do_animal.cod_porte', '=', 'Porte.cod_porte')
        ->join('Usuario', 'Postagem_do_animal.cod_usuario_postagem', '=', 'Usuario.cod_usuario')
        ->first();


        return view('solicitacaoPostagem', ['cod_postagem'=> $cod_postagem,
        'postagem'=> $postagem]
        );
    }

    public function mostrarPedidos($cod_usuario){
        $solicitacoes = \DB::table('Solicitacao')
        ->join('Postagem_do_animal', 'Postagem_do_animal.cod_postagem', '=', 'Solicitacao.cod_postagem')
        ->join('Usuario', 'Solicitacao.cod_usuario_solicitante', '=', 'Usuario.cod_usuario')
        ->where('Postagem_do_animal.cod_usuario_postagem', $cod_usuario)
        ->get()
        ;

        // dd($solicitacoes);

        return view('visualizaPedidos',compact('cod_usuario', 'solicitacoes'));


    }
}

