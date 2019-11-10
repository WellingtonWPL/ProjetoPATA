<?php

namespace App\Http\Controllers;

use App\PostagemDoAnimal;
use App\Solicitacao;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitacaoController extends Controller
{
    public function solicitar($cod_postagem){

        //  dd($_POST);


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
        $foto = \DB::table('Foto_postagem')->where('cod_postagem', $cod_postagem)->first();

        return view('solicitacaoPostagem', ['cod_postagem'=> $cod_postagem,
        'postagem'=> $postagem , 'foto'=>$foto]
        );
    }

    public function mostrarPedidos($cod_usuario){
        #solicitações para o usuario logado
        $solicitacoes = \DB::table('Solicitacao')
        ->join('Postagem_do_animal', 'Postagem_do_animal.cod_postagem', '=', 'Solicitacao.cod_postagem')
        ->join('Usuario', 'Solicitacao.cod_usuario_solicitante', '=', 'Usuario.cod_usuario')
        ->where('Postagem_do_animal.cod_usuario_postagem', $cod_usuario)
        ->where('recusada', 'nao')
        ->get()
        ;

        // dd($solicitacoes);

        //solicitações do usuario logado para outros usuarios
        $usuarioLogado= Auth::user();

        $suasSolicitacoes = \DB::table('Postagem_do_animal')
        ->join('Usuario', 'Usuario.cod_usuario', '=', 'Postagem_do_animal.cod_usuario_postagem')
        ->where('cod_usuario_adotante', $usuarioLogado->cod_usuario)
        ->get();
        // dd($suasSolicitacoes);

        // $doacoes= \DB::table('Postagem_do_animal')
        // ->join('Usuario', 'Usuario.cod_usuario', '=', 'Postagem_do_animal.cod_usuario_postagem')
        // ->where('cod_usuario_postagem', $usuarioLogado->cod_usuario)
        // ->get();

        return view('visualizaPedidos',compact('cod_usuario', 'solicitacoes', 'suasSolicitacoes'));


    }

    public function aceitarSolicitacao(Request $r){

        // dd($r->Aceitar);
        // dd($r->Recusar);
        // dd($r->postagem);
        // dd($r->donoPost);
        $postagem =PostagemDoAnimal::where('cod_postagem', $r->postagem )->first();
        // dd($postageSm);
        if (isset($r->Aceitar)) {
            $postagem->cod_usuario_adotante = $r->solicitante;
            $postagem->save();

        }else{
           $solicitacao = \DB::table('Solicitacao')
           ->where('cod_usuario_solicitante', $r->solicitante)
            ->where('cod_postagem', $r->postagem)
            ->update(['recusada' => 'sim']);
            // dd($solicitacao);
            // $solicitacao->recusada ='sim';
            // $solicitacao->save();
        }

        // troca de contatos


        return redirect($r->donoPost.'/solicitacoes');
    }

    public static function getUsuario($cod){
        return Usuario::where('cod_usuario', $cod)->first();

    }

    public function avaliarDoador($cod_postagem, Request $r){
        // dd($r->nota);
        $usuario= Auth::user();
        \DB::table('Postagem_do_animal')
        ->where('cod_postagem', $cod_postagem)
        ->update(['avaliacao_doador'=> $r->nota]);
        return redirect($usuario->cod_usuario.'/solicitacoes');
    }

    public function avaliarAdotante($cod_postagem, Request $r){
        // dd($r->nota);
        $usuario= Auth::user();
        \DB::table('Postagem_do_animal')
        ->where('cod_postagem', $cod_postagem)
        ->update(['avaliacao_adotante'=> $r->nota]);
        return redirect($usuario->cod_usuario.'/solicitacoes');
    }


}

