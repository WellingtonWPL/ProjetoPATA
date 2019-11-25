<?php

namespace App\Http\Controllers;

use App\Denuncia;
use App\FotoPostagem;
use App\PostagemDoAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function mostrar(){
        #($denuncia->finalizada=="nao"
        $denunciasDP =  Denuncia
        ::where('finalizada', '=', 'nao')
        ->join('Postagem_do_animal', 'cod_postagem_denunciada' , '=', 'Postagem_do_animal.cod_postagem')
        ->join('Usuario', 'Postagem_do_animal.cod_usuario_postagem', '=', 'Usuario.cod_usuario')
        ->join('Motivos_Denuncia', 'Denuncia.cod_motivo_denuncia', '=', 'Motivos_Denuncia.cod_motivo_denuncia')
        ->get();
        // $denuncia->finalizada=="sim" &&
        // $denuncia->listagem_postagem=='nao'
        $denunciasPI= Denuncia
        ::where('finalizada', '=', 'sim')->where('listagem_postagem', 'nao')
        ->join('Postagem_do_animal', 'cod_postagem_denunciada' , '=', 'Postagem_do_animal.cod_postagem')
        ->join('Usuario', 'Postagem_do_animal.cod_usuario_postagem', '=', 'Usuario.cod_usuario')
        ->join('Motivos_Denuncia', 'Denuncia.cod_motivo_denuncia', '=', 'Motivos_Denuncia.cod_motivo_denuncia')
        ->get();

        $fotoDP[]=null;
        $i=0;
        foreach($denunciasDP as $denuncia){
            // dd($denuncia);


            $fotoDP[$i] =
            FotoPostagem::where('cod_postagem', '=',  $denuncia->cod_postagem)->first();
            $i++;
            // dd(FotoPostagem::where('cod_postagem', $denuncia->cod_postagem_)->first());
        }
        $fotoPI[]=null;
        $i=0;
        foreach($denunciasPI as $denuncia){
            // dd($denuncia);


            $fotoPI[$i] =
            FotoPostagem::where('cod_postagem', '=',  $denuncia->cod_postagem)->first();
            $i++;
            // dd(FotoPostagem::where('cod_postagem', $denuncia->cod_postagem_)->first());
        }
        // dd($fotoPI); 

        return view('vizualizaDenunciaAdmin', compact('denunciasDP', 'denunciasPI', 'fotoDP', "fotoPI"));

    }

    public function excluir($cod_postagem){
        // dd($cod_postagem);
        Denuncia::where('cod_postagem_denunciada',$cod_postagem )
        ->update(['finalizada'=>'sim']);

        return redirect('/admin');

    }


    public function restaurar($cod_postagem){
        // dd($cod_postagem);
        Denuncia::where('cod_postagem_denunciada',$cod_postagem )
                ->update(['finalizada'=>'sim']);
        PostagemDoAnimal::where('cod_postagem', $cod_postagem)
                ->update(['listagem_postagem'=>'sim']);
        return redirect('/admin');

    }

    public static function ehAdmin(){
        $usuario = Auth::user();
        if($usuario==null){
            return false;
        }
        if($usuario->admin == 'sim'){
            return true;
        }
        else{
            return false;
        }
    }


}
