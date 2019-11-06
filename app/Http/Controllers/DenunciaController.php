<?php

namespace App\Http\Controllers;

use App\Denuncia;
use App\MotivosDenuncia;
use App\PostagemDoAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DenunciaController extends Controller
{
    public function mostrar($cod_postagem){
        $postagem = PostagemDoAnimal::where('cod_postagem', $cod_postagem)
        ->join('Usuario', 'Usuario.cod_usuario', 'Postagem_do_animal.cod_usuario_postagem')
        ->first();
        $motivosDenuncia = MotivosDenuncia::all();

        return view('denunciaPostagem',compact('postagem', 'motivosDenuncia') );

    }

    public function fazerDenuncia(Request $r, $cod_postagem){
        if ($r->motivo == "Selecione...") {
            return redirect('postagem/'.$cod_postagem.'/denunciar');
        }else{

            $usuario= Auth::user();

            $date = date('Y-m-d');
            // dd($date);

            $denuncia = new Denuncia();
            $denuncia->data_denuncia=$date;
            $denuncia->cod_usuario_denunciante=$usuario->cod_usuario;
            $denuncia->cod_postagem_denunciada=$cod_postagem;
            $denuncia->cod_motivo_denuncia=$r->motivo;
            $postagem = PostagemDoAnimal::where('cod_postagem', $cod_postagem)->first();
            $postagem->listagem_postagem= 'nao';
            $postagem->save();

            if($r->descricao!=NULL){
                $denuncia->descricao_denuncia_outro=$r->descricao;
            }

            $denuncia->save();
        }
        return view('sucesso', ['msg'=>"Denuncia realizada com sucesso"]);


    }
}
