<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PostagemDoAnimal;
use App\Porte;


class ListaController extends Controller
{
    public function mostrar(){
        // $postagens = PostagemDoAnimal::all();
        // // $porte = Porte::all();
        $postagens=\DB::table('Postagem_do_animal')
            ->join('Porte', 'Postagem_do_animal.cod_porte', '=', 'Porte.cod_porte')->get();
        // dd($coiso);
        return view('listaAnimais',
                    ['postagens'=> $postagens]);

    }
    public static function calcIdade($data){
        // como a data vem do mysql ela vem com aaaa/mm/dd
        // dd($data);
        // Separa em dia, mês e ano
        // $data = '2015-03-13';
        list($ano, $mes, $dia) = explode('-', $data);
    
        // Descobre que dia é hoje e retorna a unix timestamp
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        // Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
        // dd($hoje);
        // Depois apenas fazemos o cálculo já citado :)
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        return $idade;


    }
    public function pesquisa(){
        // dd($_POST['pesquisa']);

        
        $query='SELECT * FROM homestead.Postagem_do_animal 
                INNER JOIN Porte ON Postagem_do_animal.cod_porte = Porte.cod_porte        
                where ';
        $aux = explode(' ', $_POST['pesquisa']);
        foreach ($aux as $palavra) {
            $query.='nome_animal like \'%'.(string)$palavra.'%\' or
                     descricao like\'%'
                     .(string)$palavra.
                     '%\' or ';
        }
        $query= substr($query,0,-3);
        
        // dd($query);

        $postagens = \DB::select($query);
        return view('listaAnimais', 
                ['postagens'=> $postagens,
                 'pesquisa'=> $_POST['pesquisa']
                ]);
    }

}
