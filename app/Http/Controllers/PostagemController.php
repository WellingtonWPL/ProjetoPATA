<?php

namespace App\Http\Controllers;

use App\User;
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

        if($usuario[0]->oculto=='sim'){
            return view('sucesso', ['msg'=>'Perfil do dono da postagem excluido']);
        }
        //  dd($postagem);
        return view('postagemAnimal', ['postagem'=>$postagem]);
    }
}
