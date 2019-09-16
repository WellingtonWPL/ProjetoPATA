<?php

namespace App\Http\Controllers;

use App\User;
use App\Especie;
use App\PostagemDoAnimal;
use Illuminate\Http\Request;

class PostagemController extends Controller
{
    public function mostrar($cod_postagem){
        // dd($cod_postagem);
        $postagem = \DB::table('Postagem_do_animal')
        ->where('cod_postagem', $cod_postagem)
        ->join('Porte', 'Postagem_do_animal.cod_porte', '=', 'Porte.cod_porte')
        ->join('Usuario', 'Postagem_do_animal.cod_usuario_postagem', '=', 'Usuario.cod_usuario')
        ->first();

        $usuario = User::where('cod_usuario', $postagem->cod_usuario)->get();
        $especies = Especie::orderBy('cod_especie')->get();

        if($usuario[0]->oculto=='sim'){
            return view('sucesso', ['msg'=>'Perfil do dono da postagem excluido']);
        }
        //  dd($postagem);
        return view('postagemAnimal', ['postagem'=>$postagem]);
    }

    public function inserirPostagem(Request $data){

        //  $usuario = Auth::user();
    //    $usuario = User::where('cod_usuario', $cod_usuario)->get();
        //$data = $data->all();
        //dd($data);
        $postagem = new PostagemDoAnimal();

        $postagem->nome_animal= $data['nome'];
        $postagem->sexo= $data->sexo;
        $postagem->nascimento= $data->dataN;
        $postagem->descricao= $data->descricao;
        $postagem->castrado= $data->castrado;
        $postagem->vacinacao_em_dia= $data->vacinado;
        $postagem->vermifugado= $data->vermifugado;
        $postagem->descricao_saude= $data->descricaoSaude;
        $postagem->cod_usuario_postagem= 1;

        $postagem->cod_porte= $data->porte;
        $postagem->cod_especie= $data->especie;
        $postagem->listagem_postagem= 'sim';

        //dd($postagem);



        // dd($data);

        $postagem->save();
        //$input = $request->all();

        return response()->json(['success'=>'deu boa.']);
    }

    public function novaPostagem(){
        ///dd('TESTE');
        $especies = Especie::orderBy('cod_especie')->get();
        return view('postaAnimal', compact('especies'));

    }
}
