<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PostagemDoAnimal;
use App\Porte;
use App\Especie;
use App\Cidade;
use App\Denuncia;
use App\Estado;





class ListaController extends Controller
{
    public function mostrar(){
        // $postagens = PostagemDoAnimal::all();
        // // $porte = Porte::all();
        $postagens=\DB::table('Postagem_do_animal')
            ->join('Porte', 'Postagem_do_animal.cod_porte', '=', 'Porte.cod_porte')
            ->where('cod_usuario_adotante', NULL)
            ->get();
        // dd($coiso);]

        $estados = Estado::all();
        $cidades = Cidade::all();
        // dd($cidades);
        $especies = Especie::orderBy('cod_especie')->get();
        // dd($postagens);
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

    /*
    Essa função precisa ser revista, mesmo sendo feita por mim lendo a documentação
     posteriormente pude ver que ela por ser mais bem feita usando models ou o \DB
     mas por enquando esta funcionando
    */
    public function pesquisa(Request $r){

        // dd(($_POST));


        $query='SELECT * FROM Postagem_do_animal
                INNER JOIN Porte ON Postagem_do_animal.cod_porte = Porte.cod_porte
                INNER JOIN Usuario on Usuario.cod_usuario = Postagem_do_animal.cod_usuario_postagem
                inner join Cidade on Cidade.cod_cidade = Usuario.cod_cidade
                ';

        //ver se tem algo setado para colocar o where
        if( $_POST['pesquisa']!=''          ||
            $_POST['cidade']!="Selecione"   ||
            $_POST['especie']!="Selecione"  ||
            isset($_POST['pequeno']) ||
            isset($_POST['medio']) ||
            isset($_POST['grande']) ||
            isset($_POST['0-1']) ||
             isset($_POST['1-3']) ||
             isset($_POST['3+'])

        ){
            $query .= ' where ';
        }

        if($_POST['pesquisa']!=''){

            $aux = explode(' ', $_POST['pesquisa']);
            foreach ($aux as $palavra) {
                $query.='Postagem_do_animal.nome_animal like \'%'.(string)$palavra.'%\' or
                Postagem_do_animal.descricao like\'%'
                .(string)$palavra.
                '%\' or ';
            }

            $query= substr($query,0,-3);
        }
        // dd($r->cidade!='Selecione');
        if($_POST['cidade']!="Selecione" && $_POST['pesquisa']!=''){
            $query.=' and ';

        }



        if($_POST['cidade']!="Selecione"){
            $query.='Cidade.cod_cidade = '.$_POST['cidade'];

        }

        if(($_POST['cidade']!="Selecione" || $r->pesquisa != '') && $_POST['especie']!="Selecione"){
            $query .= ' and ';
        }


        if($_POST['especie']!="Selecione"){
            $query.='cod_especie = '.$_POST['especie'];

        }
        if (($_POST['cidade']!="Selecione" ||
            $_POST['especie']!="Selecione" ||
            $_POST['pesquisa']!='')
            &&
            ((isset($_POST['pequeno']) ||
            isset($_POST['medio']) ||
            isset($_POST['grande']) ))

            ){
                // dd($_POST['cidade']=="Selecione" );
                // dd($_POST['especie']=="Selecione" );
                // dd($_POST['pesquisa']!='');

                            //  dd($_POST['cidade']!="Selecione" ||
                            //  $_POST['especie']!="Selecione" ||
                            //  $_POST['pesquisa']!='' );
             $query .= " and ";

        }
        // dd('cuza gostoso');

        if((isset($_POST['pequeno']) ||
           isset($_POST['medio']) ||
           isset($_POST['grande'] ))) {
            $query .= " ( ";
        }


        if(isset($_POST['pequeno'])  ){
            $query .= "Postagem_do_animal.cod_porte = 1 or";
        }
        if(isset($_POST['medio'])  ){
            $query .= " Postagem_do_animal.cod_porte = 2 or";
        }
        if(isset($_POST['grande'])  ){
            $query .= " Postagem_do_animal.cod_porte = 3 or";
        }



        if(isset($_POST['pequeno']) || isset($_POST['medio']) || isset($_POST['grande'])){
            $query= substr($query,0,-3);
            $query .= " )";
        }



        $hoje = ''.date('Y').'-'.date('m').'-'.date('d');
        // dd($hoje);
        $umAnoAntes=''.(date('Y')-1).'-'.date('m').'-'.date('d');
        $tresAnosAntes = ''.(date('Y')-3).'-'.date('m').'-'.date('d');
        // dd(date($hoje));
        // dd($_POST);

        if(isset($_POST['0-1']) || isset($_POST['1-3']) || isset($_POST['3+']) ){
            $query.= ' and (  ';

        }
        if(isset($_POST['0-1'])){
            $query .='   nascimento >= \''.$umAnoAntes.'\' AND nascimento <= \''.$hoje.'\'';

        }


        if(isset($_POST['1-3'])){
            if(isset($_POST['0-1'])){
                $query .= ' or ';

            }
            $query .=' nascimento >= \''.$tresAnosAntes.'\' AND nascimento <= \''.$umAnoAntes.'\'';

        }if(isset($_POST['3+'])){
            if(isset($_POST['0-1']) || isset($_POST['1-3']) ){
                $query .= ' or ';

            }
            $query .='  nascimento <= \''.$tresAnosAntes.'\'';
        }

        if(isset($_POST['0-1']) || isset($_POST['1-3']) || isset($_POST['3+']) ){
            $query.= ' )  ';

        }

        // dd($query);

        $postagens = \DB::select($query);



        $estados = Estado::all();
        $cidades = Cidade::all();
        //  dd($cidades);
        $especies = Especie::orderBy('cod_especie')->get();
        // dd('das');
        return view('listaAnimais', compact('postagens', 'cidades', 'estados', 'especies'));
    }

    public static function getFotosAnimal($cod){

        $fotos = \App\FotoPostagem::where('cod_postagem', $cod)->get();
        // dd($fotos->isEmpty());
        return $fotos;

    }

    // public static function temDenuncia($cod_postagem){
    //     $denuncias= Denuncia::all();



    // }

}
