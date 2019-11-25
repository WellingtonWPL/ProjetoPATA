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

    private $query = "";
    public function mostrar()
    {

        return redirect("lista/1");
        // $postagens = PostagemDoAnimal::all();
        // // $porte = Porte::all();
        // $postagens= \DB::table('Postagem_do_animal')
        //     ->join('Porte', 'Postagem_do_animal.cod_porte', '=', 'Porte.cod_porte')
        //     ->where('cod_usuario_adotante', NULL)
        //     ->get();
        // // dd($coiso);]


        // $estados = Estado::all()->sortBy('sigla_estado');
        // $cidades = Cidade::all()->sortBy('nome_cidade');
        // // dd($cidades);

        // $especies = Especie::orderBy('cod_especie')->get();
        // // dd($postagens);
        // return view('listaAnimais', compact('postagens', 'cidades', 'estados', 'especies'));


    }



    public function mostrarPagina($pagina)
    {
        $postagens = PostagemDoAnimal::all();
        // $porte = Porte::all();
        $numPostagens = \DB::table('Postagem_do_animal')->where('listagem_postagem','sim')
            ->count();

        $numPaginas = intval($numPostagens / 10) + 1;

        if ($pagina > $numPaginas) {
            return redirect("lista/" . $numPaginas);
        }
        if ($pagina < 1) {
            return redirect("lista/1");
        }

        $postagens = \DB::table('Postagem_do_animal')
            ->join('Porte', 'Postagem_do_animal.cod_porte', '=', 'Porte.cod_porte')
            ->where('cod_usuario_adotante', NULL)
            ->orderBy('cod_postagem', 'DESC')
            ->skip(($pagina - 1) * 10)->take(10)
            ->get();
        // dd($coiso);]
        // dd($numPaginas);
        $estados = Estado::all()->sortBy('nome_estado');
        $cidades = Cidade::all()->sortBy('nome_cidade');
        // dd($cidades);

        $especies = Especie::orderBy('nome_especie')->get();
        // dd($postagens);
        $primeira = 1;
        $prox = $pagina+1;
        $ant = $pagina-1;
        $ultima = $numPaginas;
        // $postagens = \DB::select($query);
        

        // 'prox','primeira','ant','ultima'

        return view('listaAnimais', compact('prox','primeira','ant','ultima',   'postagens', 'cidades', 'estados', 'especies', 'pagina', 'numPaginas'));
    }

    public static function calcIdade($data)
    {
        // como a data vem do mysql ela vem com aaaa/mm/dd
        // dd($data);
        // Separa em dia, mês e ano
        // $data = '2015-03-13';
        list($ano, $mes, $dia) = explode('-', $data);

        // Descobre que dia é hoje e retorna a unix timestamp
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        // Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
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
    // public function pesquisa(Request $r, $pagina)
    // {

    //     $numPostagens = \DB::table('Postagem_do_animal')
    //         ->count();

    //     $numPaginas = intval($numPostagens / 10) + 1;

    //     if ($pagina > $numPaginas) {
    //         return redirect("lista/" . $numPaginas);
    //     }
    //     if ($pagina < 1) {
    //         return redirect("lista/1");
    //     }


    //     // dd(($_POST));


    //     $query = 'SELECT * FROM Postagem_do_animal
    //             INNER JOIN Porte ON Postagem_do_animal.cod_porte = Porte.cod_porte
    //             INNER JOIN Usuario on Usuario.cod_usuario = Postagem_do_animal.cod_usuario_postagem
    //             inner join Cidade on Cidade.cod_cidade = Usuario.cod_cidade
    //             ';

    //     //ver se tem algo setado para colocar o where
    //     if (
    //         $_POST['pesquisa'] != ''          ||
    //         $_POST['cidade'] != "Selecione"   ||
    //         $_POST['especie'] != "Selecione"  ||
    //         isset($_POST['pequeno']) ||
    //         isset($_POST['medio']) ||
    //         isset($_POST['grande']) ||
    //         isset($_POST['0-1']) ||
    //         isset($_POST['1-3']) ||
    //         isset($_POST['3+'])

    //     ) {
    //         $query .= ' where ';
    //     }

    //     if ($_POST['pesquisa'] != '') {

    //         $aux = explode(' ', $_POST['pesquisa']);
    //         foreach ($aux as $palavra) {
    //             $query .= 'Postagem_do_animal.nome_animal like \'%' . (string) $palavra . '%\' or
    //             Postagem_do_animal.descricao like\'%'
    //                 . (string) $palavra .
    //                 '%\' or ';
    //         }

    //         $query = substr($query, 0, -3);
    //     }
    //     // dd($r->cidade!='Selecione');
    //     if ($_POST['cidade'] != "cidade" && $_POST['pesquisa'] != '') {
    //         $query .= ' and ';
    //     }



    //     if ($_POST['cidade'] != "cidade") {
    //         $query .= 'Cidade.cod_cidade = ' . $_POST['cidade'];
    //     }

    //     if (($_POST['cidade'] != "cidade" || $r->pesquisa != '') && $_POST['especie'] != "Selecione") {
    //         $query .= ' and  ';
    //     }


    //     if ($_POST['especie'] != "Selecione") {
    //         $query .= 'cod_especie = ' . $_POST['especie'];
    //     }
    //     if (($_POST['cidade'] != "cidade" ||
    //             $_POST['especie'] != "Selecione" ||
    //             $_POST['pesquisa'] != '')
    //         && ((isset($_POST['pequeno']) ||
    //             isset($_POST['medio']) ||
    //             isset($_POST['grande'])))

    //     ) {

    //         // dd($_POST['cidade']=="Selecione" );
    //         // dd($_POST['especie']=="Selecione" );
    //         // dd($_POST['pesquisa']!='');

    //         //  dd($_POST['cidade']!="Selecione" ||
    //         //  $_POST['especie']!="Selecione" ||
    //         //  $_POST['pesquisa']!='' );
    //         $query .= " and   ";
    //     }
    //     //

    //     if ((isset($_POST['pequeno']) ||
    //         isset($_POST['medio']) ||
    //         isset($_POST['grande']))) {
    //         $query .= " ( ";
    //     }


    //     if (isset($_POST['pequeno'])) {
    //         $query .= "Postagem_do_animal.cod_porte = 1 or";
    //     }
    //     if (isset($_POST['medio'])) {
    //         $query .= " Postagem_do_animal.cod_porte = 2 or";
    //     }
    //     if (isset($_POST['grande'])) {
    //         $query .= " Postagem_do_animal.cod_porte = 3 or";
    //     }



    //     if (isset($_POST['pequeno']) || isset($_POST['medio']) || isset($_POST['grande'])) {
    //         $query = substr($query, 0, -3);
    //         $query .= " )";
    //     }


    //     //calculo datas
    //     $hoje = '' . date('Y') . '-' . date('m') . '-' . date('d');

    //     $umAnoAntes = '' . (date('Y') - 1) . '-' . date('m') . '-' . date('d');
    //     $tresAnosAntes = '' . (date('Y') - 3) . '-' . date('m') . '-' . date('d');
    //     // dd($_POST);

    //     if (
    //         $_POST['pesquisa'] != ''          ||
    //         $_POST['cidade'] != "cidade"   ||
    //         $_POST['especie'] != "Selecione"  ||
    //         isset($_POST['pequeno']) ||
    //         isset($_POST['medio']) ||
    //         isset($_POST['grande'])
    //         // && (isset($_POST['0-1']) || isset($_POST['1-3']) || isset($_POST['3+']))
    //     ) {
    //         if ((isset($_POST['0-1']) || isset($_POST['1-3']) || isset($_POST['3+']))) {
    //             $query .= '  and  ';
    //         }
    //     }
    //     if (isset($_POST['0-1']) || isset($_POST['1-3']) || isset($_POST['3+'])) {
    //         $query .= ' (  ';
    //     }
    //     if (isset($_POST['0-1'])) {
    //         $query .= '   nascimento >= \'' . $umAnoAntes . '\' AND nascimento <= \'' . $hoje . '\'';
    //     }


    //     if (isset($_POST['1-3'])) {
    //         if (isset($_POST['0-1'])) {
    //             $query .= ' or ';
    //         }
    //         $query .= ' nascimento >= \'' . $tresAnosAntes . '\' AND nascimento <= \'' . $umAnoAntes . '\'';
    //     }
    //     if (isset($_POST['3+'])) {
    //         if (isset($_POST['0-1']) || isset($_POST['1-3'])) {
    //             $query .= ' or ';
    //         }
    //         $query .= '  nascimento <= \'' . $tresAnosAntes . '\'';
    //     }

    //     if (isset($_POST['0-1']) || isset($_POST['1-3']) || isset($_POST['3+'])) {
    //         $query .= ' )  ';
    //     }

    //     // dd($query);
    //     // >skip(($pagina-1 )*10)->take(10)
    //     $aux = $query;
    //     $query .= "  LIMIT 10 OFFSET " . (($pagina - 1) * 10);
    //     $postagens = \DB::select($query);

    //     $query = $aux;


    //     $estados = Estado::all()->sortBy('nome_estado');
    //     $cidades = Cidade::all()->sortBy('nome_cidade');
    //     //  dd($cidades);
    //     $especies = Especie::orderBy('nome_especie')->get();
    //     // dd('das');
    //     dd($numPaginas);
    //     $primeira = 1;
    //     $prox = $pagina+1;
    //     $ant = $pagina-1;
    //     $ultima = $numPaginas;

    //     $pesquisa = true;
    //     return view('listaAnimais', compact('prox','primeira','ant','ultima', 'postagens', 'cidades', 'estados', 'especies', 'pagina', 'numPaginas', 'pesquisa', 'query'));
    // }


    public function listaFiltro(Request $r, $pagina)
    {
        // dd($_GET['especie']);
        // $numPostagens = \DB::table('Postagem_do_animal')
        //     ->count();

        // $numPaginas = intval($numPostagens / 10) + 1;



        // dd(($_GET));


        $query = 'SELECT * FROM Postagem_do_animal
        INNER JOIN Porte ON Postagem_do_animal.cod_porte = Porte.cod_porte
        INNER JOIN Usuario on Usuario.cod_usuario = Postagem_do_animal.cod_usuario_postagem
        inner join Cidade on Cidade.cod_cidade = Usuario.cod_cidade
';
        // dd($_GET);
        //ver se tem algo setado para colocar o where
        if (
            $_GET['pesquisa'] != ''          ||
            $_GET['cidade'] != "cidade"   ||
            $_GET['especie'] != "Selecione"  ||
            isset($_GET['pequeno']) ||
            isset($_GET['medio']) ||
            isset($_GET['grande']) ||
            isset($_GET['0-1']) ||
            isset($_GET['1-3']) ||
            isset($_GET['3+'])

        ) {
            $query .= ' where ';
        }

        if ($_GET['pesquisa'] != '') {

            $aux = explode(' ', $_GET['pesquisa']);
            foreach ($aux as $palavra) {
                $query .= 'Postagem_do_animal.nome_animal like \'%' . (string) $palavra . '%\' or
                Postagem_do_animal.descricao like\'%'
                    . (string) $palavra .
                    '%\' or ';
            }

            $query = substr($query, 0, -3);
        }
        // dd($r->cidade!='Selecione');
        if ($_GET['cidade'] != "cidade" && $_GET['pesquisa'] != '') {
            $query .= ' and ';
        }



        if ($_GET['cidade'] != "cidade") {
            $query .= 'Cidade.cod_cidade = ' . $_GET['cidade'];
        }

        if (($_GET['cidade'] != "cidade" || $r->pesquisa != '') && $_GET['especie'] != "Selecione") {
            $query .= ' and  ';
        }


        if ($_GET['especie'] != "Selecione") {
            $query .= 'cod_especie = ' . $_GET['especie'];
        }
        if (($_GET['cidade'] != "cidade" ||
                $_GET['especie'] != "Selecione" ||
                $_GET['pesquisa'] != '')
            && ((isset($_GET['pequeno']) ||
                isset($_GET['medio']) ||
                isset($_GET['grande'])))

        ) {

            // dd($_GET['cidade']=="Selecione" );
            // dd($_GET['especie']=="Selecione" );
            // dd($_GET['pesquisa']!='');

            //  dd($_GET['cidade']!="Selecione" ||
            //  $_GET['especie']!="Selecione" ||
            //  $_GET['pesquisa']!='' );
            $query .= " and   ";
        }
        //

        if ((isset($_GET['pequeno']) ||
            isset($_GET['medio']) ||
            isset($_GET['grande']))) {
            $query .= " ( ";
        }


        if (isset($_GET['pequeno'])) {
            $query .= "Postagem_do_animal.cod_porte = 1 or";
        }
        if (isset($_GET['medio'])) {
            $query .= " Postagem_do_animal.cod_porte = 2 or";
        }
        if (isset($_GET['grande'])) {
            $query .= " Postagem_do_animal.cod_porte = 3 or";
        }



        if (isset($_GET['pequeno']) || isset($_GET['medio']) || isset($_GET['grande'])) {
            $query = substr($query, 0, -3);
            $query .= " )";
        }


        //calculo datas
        $hoje = '' . date('Y') . '-' . date('m') . '-' . date('d');

        $umAnoAntes = '' . (date('Y') - 1) . '-' . date('m') . '-' . date('d');
        $tresAnosAntes = '' . (date('Y') - 3) . '-' . date('m') . '-' . date('d');
        // dd($_GET);

        if (
            $_GET['pesquisa'] != ''          ||
            $_GET['cidade'] != "cidade"   ||
            $_GET['especie'] != "Selecione"  ||
            isset($_GET['pequeno']) ||
            isset($_GET['medio']) ||
            isset($_GET['grande'])
            // && (isset($_GET['0-1']) || isset($_GET['1-3']) || isset($_GET['3+']))
        ) {
            if ((isset($_GET['0-1']) || isset($_GET['1-3']) || isset($_GET['3+']))) {
                $query .= '  and  ';
            }
        }
        if (isset($_GET['0-1']) || isset($_GET['1-3']) || isset($_GET['3+'])) {
            $query .= ' (  ';
        }
        if (isset($_GET['0-1'])) {
            $query .= '   nascimento >= \'' . $umAnoAntes . '\' AND nascimento <= \'' . $hoje . '\'';
        }


        if (isset($_GET['1-3'])) {
            if (isset($_GET['0-1'])) {
                $query .= ' or ';
            }
            $query .= ' nascimento >= \'' . $tresAnosAntes . '\' AND nascimento <= \'' . $umAnoAntes . '\'';
        }
        if (isset($_GET['3+'])) {
            if (isset($_GET['0-1']) || isset($_GET['1-3'])) {
                $query .= ' or ';
            }
            $query .= '  nascimento <= \'' . $tresAnosAntes . '\'';
        }

        if (isset($_GET['0-1']) || isset($_GET['1-3']) || isset($_GET['3+'])) {
            $query .= ' )  ';
        }

        // dd($query);
        // >skip(($pagina-1 )*10)->take(10)
        $postagens = \DB::select($query);
        $numPaginas=0;
        foreach ($postagens as $postagem){
            if($postagem->listagem_postagem == 'sim'){
                $numPaginas++;
            }
        }
        $numPaginas = $numPaginas/10;
        $numPaginas=intval($numPaginas)+1;
        $query .= "  LIMIT 10 OFFSET " . (($pagina - 1) * 10);
        $postagens = \DB::select($query);
        // dd($numPaginas);

        // $numPaginas = count($postagens)/10;
        // if ($pagina > $numPaginas) {
        //     return redirect("lista/" . $numPaginas);
        // }
        // if ($pagina < 1) {
        //     return redirect("lista/1");
        // }



        // dd($query);



        $estados = Estado::all()->sortBy('nome_estado');
        $cidades = Cidade::all()->sortBy('nome_cidade');
        //  dd($cidades);
        $especies = Especie::orderBy('nome_especie')->get();
        // dd('das');

        $pesquisa = true;

        $pesquisa = true;
        $primeira = 1;
        $prox = $pagina+1;
        $ant = $pagina-1;
        $ultima = $numPaginas;

        // dd($prox);
        return view('listaAnimais', compact('prox','primeira','ant','ultima', 'postagens', 'cidades', 'estados', 'especies', 'pagina', 'numPaginas', 'pesquisa', 'query'));
        // return view('listaAnimais', compact('postagens', 'cidades', 'estados', 'especies', 'pagina', 'numPaginas', 'pesquisa'));



        //============================
        // $numPostagens = \DB::table('Postagem_do_animal')
        //     ->count();

        // $numPaginas = intval($numPostagens / 10) + 1;

        // if ($pagina > $numPaginas) {
        //     return redirect("lista/" . $numPaginas);
        // }
        // if ($pagina < 1) {
        //     return redirect("lista/1");
        // }

        // // dd('bhjbjk,.');
        // // $query = $r->Query;

        // $query .= "  LIMIT 10 OFFSET " . (($pagina - 1) * 10);
        // $postagens = \DB::select($query);


        // $query = $r->Query;
        // $estados = Estado::all()->sortBy('nome_estado');
        // $cidades = Cidade::all()->sortBy('nome_cidade');
        // //  dd($cidades);
        // $especies = Especie::orderBy('cod_especie')->get();

        // $pesquisa = true;
        // $primeira = 1;
        // $prox = $pagina+1;
        // $ant = $pagina-1;
        // $ultima = $numPaginas;

        // dd($prox);
        // return view('listaAnimais', compact('prox','primeira','ant','ultima', 'postagens', 'cidades', 'estados', 'especies', 'pagina', 'numPaginas', 'pesquisa', 'query'));
    }

    public static function buscaLocal($cod)
    {
        //$cod = \App\PostagemDoAnimal::where('cod_postagem', $r)->get();
        $query = "SELECT Cidade.nome_cidade
        FROM Cidade , Usuario , Postagem_do_animal
        WHERE Postagem_do_animal.cod_postagem =  $cod
        AND Usuario.cod_usuario = Postagem_do_animal.cod_usuario_postagem
        AND Usuario.cod_cidade = Cidade.cod_cidade";
        $local = \DB::select($query);
        return $local;
    }

    public static function getFotosAnimal($cod)
    {

        $fotos = \App\FotoPostagem::where('cod_postagem', $cod)->get();
        // dd($fotos->isEmpty());
        return $fotos;
    }
}
