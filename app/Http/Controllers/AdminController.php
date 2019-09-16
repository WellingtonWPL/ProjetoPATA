<?php

namespace App\Http\Controllers;

use App\Denuncia;
use App\PostagemDoAnimal;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function mostrar(){

        $denuncias =  Denuncia
        ::join('Postagem_do_animal', 'cod_postagem_denunciada' , '=', 'Postagem_do_animal.cod_postagem')
        ->join('Usuario', 'Postagem_do_animal.cod_usuario_postagem', '=', 'Usuario.cod_usuario')
        ->join('Motivos_Denuncia', 'Denuncia.cod_motivo_denuncia', '=', 'Motivos_Denuncia.cod_motivo_denuncia')
        ->get();

        //  dd($denuncias);



        return view('vizualizaDenunciaAdmin', compact('denuncias'));

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
}
