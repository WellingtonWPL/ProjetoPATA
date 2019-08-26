<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public static function getAvaliacao($cod){
        // // // dd($cod);
        $avaliacoes = \DB::table('Postagem_do_animal')
        ->where('cod_usuario_postagem', $cod)
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
            return ($aux/$cont);
        }
        


    }
}
