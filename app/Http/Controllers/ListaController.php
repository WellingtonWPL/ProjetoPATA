<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PostagemDoAnimal;
use App\Porte;
use App\Especie;
use App\Cidade;
use App\Estado;





class ListaController extends Controller
{
    public function mostrar(){
        // $postagens = PostagemDoAnimal::all();
        // // $porte = Porte::all();
        $postagens=\DB::table('Postagem_do_animal')
            ->join('Porte', 'Postagem_do_animal.cod_porte', '=', 'Porte.cod_porte')->get();
        // dd($coiso);]

        $estados = Estado::all();
        $cidades = Cidade::all();
        // dd($cidades);
        $especies = Especie::orderBy('cod_especie')->get();

        return view('listaAnimais', compact('postagens', 'cidades', 'estados', 'especies'));
                    

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
        
        dd(($_POST));

        
        $query='SELECT * FROM homestead.Postagem_do_animal 
                INNER JOIN Porte ON Postagem_do_animal.cod_porte = Porte.cod_porte        
                where ';
        if($_POST['pesquisa']!=''){

            $aux = explode(' ', $_POST['pesquisa']);
            foreach ($aux as $palavra) {
                $query.='nome_animal like \'%'.(string)$palavra.'%\' or
                descricao like\'%'
                .(string)$palavra.
                '%\' or ';
            }
            
            $query= substr($query,0,-3);
        }        

        

        if($_POST['cidade']!="Selecione"){
            $query.='and cod_cidade = '.$_POST['cidade'];

        }

        if($_POST['especie']!="Selecione"){
            $query.='and cod_especie = '.$_POST['cidade'];

        }
        if(isset($_POST['pequeno']) || isset($_POST['medio']) || isset($_POST['grande'])){
            $query .= " and (";
        }


        if(isset($_POST['pequeno'])  ){
            $query .= " cod_porte = 1 or";
        }
        if(isset($_POST['medio'])  ){
            $query .= " cod_porte = 2 or";
        }
        if(isset($_POST['grande'])  ){
            $query .= " cod_porte = 3 or";
        }

        $query= substr($query,0,-3);

        if(isset($_POST['pequeno']) || isset($_POST['medio']) || isset($_POST['grande'])){
            $query .= " )";
        }

        
        dd($query);

        $postagens = \DB::select($query);

        $estados = Estado::all();
        $cidades = Cidade::all();
        // dd($cidades);
        $especies = Especie::orderBy('cod_especie')->get();

        return view('listaAnimais', compact('postagens', 'cidades', 'estados', 'especies'));
    }

    public static function getFotosAnimal($cod){

        $fotos = \App\FotoPostagem::where('cod_postagem', $cod)->get();
        // dd($fotos->isEmpty());
        return $fotos;

    }

}
