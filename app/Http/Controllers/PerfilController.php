<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use App\PostagemDoAnimal;
use App\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public static function getAvaliacao($cod){
        // // // dd($cod);
        $avaliacoes = \DB::table('Postagem_do_animal')
        ->where('cod_usuario_postagem', $cod)
        ->where('avaliacao', '!=', NULL)
        ->get();

        if($avaliacoes==NULL){
            return $avaliacoes;
        }else{

            $cont=0;
            $aux=0;
            // if(!is_array($avaliacoes)){
            //     dd()
            //     return $avaliacoes;
            // }
            foreach ($avaliacoes as $avaliacao) {
                $aux+=$avaliacao->avaliacao;
                $cont++;
            }
            // dd($aux);
            if($cont==0){   return 0;   }
            return ($aux/$cont);
        }
    }

    public function mostrar($cod_usuario){
        $usuario = User::where('cod_usuario', $cod_usuario)->get();
        return view('perfilUsuario', ['cod_usuario'=>$cod_usuario, 'usuario'=>$usuario]);
    }

    public static function getPostagens($cod_usuario){
        // $postagens = PostagemDoAnimal::where('cod_usuario_postagem', $cod_usuario)->get();
        $postagens=\DB::table('Postagem_do_animal')
            ->join('Porte', 'Postagem_do_animal.cod_porte', '=', 'Porte.cod_porte')->where('cod_usuario_postagem', $cod_usuario)->get();
        return $postagens;


    }

    public static function getCidade($cod_cidade){

        $cidade =Cidade::where('cod_cidade', $cod_cidade)->get();

        // dd($cidade[0]->cod_estado);
        $estado= Estado::where('cod_estado', $cidade[0]->cod_estado)->get();
        // $estado= Estado::where('cod_estado', 2)->get();


        // dd($estado[0]->sigla_estado );
        return[$cidade[0]->nome_cidade, $estado[0]->sigla_estado ];


    }


}
