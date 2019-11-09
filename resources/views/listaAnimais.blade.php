@php
// dd('oi');
//  dd($postagens==null);

$url =explode ( '/' ,$_SERVER["REQUEST_URI"]) ;
if(isset($url[3])){

    $primeira = 'lista_filtro/1/'.$url[3];
    $prox = 'lista_filtro/'.($pagina+1).'/'.$url[3];
    $ant = 'lista_filtro/'.($pagina-1).'/'.$url[3];
    $ultima = 'lista_filtro/'.$numPaginas.'/'.$url[3];
}

// dd(intval($numPaginas)+1);
// if ($pagina > $numPaginas) {
//     return redirect($ultima);
// }
// if ($pagina < 1) {
//     return redirect($primeira);
// }


use \app\Http\Controllers\ListaController;

@endphp

@extends('template')
@section("titulo", "Lista de Animais")
@section('css')
<link rel="stylesheet"
    href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    #campo {
        border-style: solid;
        border-width: 1px;
        border-color: #F5F5F5;
        border-radius: 15px;
        margin-top: 3%;
        max-height: 160px;
        background-color: #FAFAFA;
    }

    div button {
        margin: 2%;
    }

    #foto-perfil {
        margin: 1%;
        border-style: solid;
        border-width: 1px;
        border-color: #F5F5F5;
        /* width: 80%; */
        max-height: 200px;
        padding: 15px;
        margin-right: 100px;
    }

    /* } */

    /* div a img {
        margin: 2%;
        border-style: solid;
        border-width: 1px;
        border-color: #F5F5F5;
        /* width: 100%; */
        /* max-height: 150px;
        padding: 10px; */


    /* } */

    #filtro {
        border-style: solid;
        border-width: 1px;
        margin-top: 5%;
        /* float: left; */
        /* width: 30%;  */

    }
</style>
@endsection


@section('conteudo')

 <div class="card ">
   <div class="card-body">


<form action="/lista_filtro/1/" method="GET">
    @csrf
    {{-- <div class="col"> --}}
    {{-- <div class="input-group-prepend"> --}}
    <input class="form-control" name='pesquisa'
           id="barraDePesquisa" placeholder="Pesquise aqui" maxlength="65535">
    <br>
    <a class="" data-toggle="collapse" href="#collapseExample"
    @if(isset($pesquisa))
        aria-expanded="true"
    @else
        aria-expanded="false"
    @endif
    aria-controls="collapseExample"
    style="text-decoration: none; color:black;">
    <h4>Filtro  <i class="material-icons">keyboard_arrow_down</i> </h4>
    </a>

    <div class="collapse" id="collapseExample">
        <div class="row">
            <div class="col-md">
                Estado
                <select name="estado" class="estado form-control">
                    <option value="estado" selected>Selecione</option>
                    @foreach ($estados as $estado)
                    <option value="{{ $estado->cod_estado }}"
                        @if(isset($_GET['estado'] ) && $_GET['estado']==$estado->cod_estado)
                            selected
                        @endif>
                            {{$estado->sigla_estado}}
                    </option>
                    @endforeach
                </select>
                <div name="div_cidade" style="display: ;" id="div_cidade">
                    Cidade
                    <select name="cidade" id="cidade" class="form-control">
                        <option value="cidade" selected>Selecione</option>
                        @foreach ($cidades as $cidade)
                        <option class="cidade {{$cidade->cod_estado}}"
                                value="{{$cidade->cod_cidade}}"
                                @if(isset($_GET['cidade'])&&$_GET['cidade']==$cidade->cod_cidade)
                                    selected
                                @endif>
                                {{$cidade->nome_cidade}}
                        </option>
                        @endforeach
                        {{-- <option>Ponta Grossa</option> --}}
                    </select>
                </div>
            </div>
            <div class="col">
                Espécie

                <select name="especie" class="form-control">

                    <option selected>Selecione</option>
                    @foreach ($especies as $especie)
                    <option value="{{$especie->cod_especie}}"
                            @if(isset($_GET['especie']) && $_GET['especie']==$especie->cod_especie)
                            selected
                        @endif>
                        {{$especie->nome_especie}}</option>
                    @endforeach
                    {{-- <option>Ponta Grossa</option> --}}
                </select>

            </div>
            @php

                // dd(isset($_GET['0-1']))
            @endphp
            <div class="col">
                Idade
                <div class="form-check">
                    <input type="checkbox"
                        class="form-check-input"
                        id="exampleCheck1" name="0-1"
                        value="0-1"
                        @if (isset($_GET['0-1']))
                            checked
                        @endif
                        >
                    <label class="form-check-label"
                        for="exampleCheck1" >0-1 ano</label>
                </div>
                <div class="form-check">
                    <input type="checkbox"
                        class="form-check-input"
                        id="exampleCheck1" name="1-3"
                        value="1-3"
                        @if (isset($_GET['1-3']))
                            checked
                        @endif
                        >
                    <label class="form-check-label"
                        for="exampleCheck1">1-3 anos</label>
                </div>
                <div class="form-check">
                    <input type="checkbox"
                        class="form-check-input"
                        id="exampleCheck1" name="3+" value="3+"
                        @if (isset($_GET['3+']))
                            checked
                        @endif
                        >
                    <label class="form-check-label"
                        for="exampleCheck1">mais 3 anos</label>
                </div>
            </div>

            <div class="col">
                Porte
                <div class="form-check">
                    <input type="checkbox"
                        class="form-check-input" name="pequeno"
                        value="1"
                        @if (isset($_GET['pequeno']))
                            checked
                        @endif
                        >
                    <label class="form-check-label"
                        for="exampleCheck1">Pequeno</label>
                </div>
                <div class="form-check">
                    <input type="checkbox"
                        class="form-check-input" name="medio"
                        value="2"
                        @if (isset($_GET['medio']))
                            checked
                        @endif>
                    <label class="form-check-label"
                        for="exampleCheck1">Médio</label>
                </div>
                <div class="form-check">
                    <input type="checkbox"
                        class="form-check-input" name="grande"
                        value="3"
                        @if (isset($_GET['grande']))
                        checked
                    @endif>
                    <label class="form-check-label"
                        for="exampleCheck1">Grande</label>
                </div>
            </div>

        </div>
    </div>
    <br>

    <input type="submit" value='Pesquisar'
        class="btn btn-primary">

</form>

</div>
</div>
<br>

            @php
                // $url =explode ( '/' ,$_SERVER["REQUEST_URI"]) ;
                // $primeira = 'lista_filtro/1/'.$url[3];
                // $prox = 'lista_filtro/'.($pagina+1).'/'.$url[3];
                // $ant = 'lista_filtro/'.($pagina-1).'/'.$url[3];
                // $ultima = 'lista_filtro/'.$numPaginas.'/'.$url[3];

                // dd($ultima);
            @endphp

@if ($postagens==null)
    <div class="card ">
      <div class="card-body">
        <h4>Nenhum animal encontrado</h4>
      </div>
    </div>
@else




@if (isset($pesquisa))
    <div class="row">

        @if ($pagina != 1)
            <a style="margin-right:1em" href = "{{ url('/')}}/{{$primeira}} ">
                <button class="btn btn-sm"> Primeira </button>
            </a>
            <a style="margin-right:1em" href = "{{url('/')}}/{{$ant}}">
                <button class="btn btn-sm"> < </button>
            </a>


            {{-- <form class="form"action="{{ url('lista_filtro/'.($pagina-1).'/'.$url[3] )}}" method= "POST" >
                @csrf
                <button class="btn btn-sm" type="submit"> < </button>
                {{-- <input type="hidden" name="Query" value="{{$query}}">
            </form> --}}
        @endif


        <button style="margin-top: 0" class="btn btn-sm"> {{$pagina}}</button>

        @if ($pagina != $numPaginas)
            {{-- <form class="form"action="{{ url('lista_filtro/'.($pagina+1) )}}" method= "POST" >
                @csrf
                <button class="btn btn-sm" type="submit"> > </button>
                {{-- <input type="hidden" name="Query" value="{{$query}}">
            </form> --}}
            <a style="margin-right:1em" href = "{{ url('/')}}/{{$prox}}">
                <button class="btn btn-sm"> > </button>
            </a>
            <a style="margin-right:1em" href = "{{ url('/')}}/{{$ultima}}">
                <button class="btn btn-sm"> Ultima </button>
            {{-- </a>
            <a style="margin-left:1em" href="{{url("lista/".$numPaginas)}}">
                <button class="btn btn-sm" > Ultima </button>
            </a> --}}
        @endif
        {{--
            @if ($pagina != $numPaginas)

            <a href="{{url("lista/".$numPaginas)}}">
                <button class="btn btn-sm" > Ultima </button>
            </a>


        @endif --}}



    </div>
@else
    @if ($pagina != 1)
    <a  href = "{{url("lista/1")}}">
        <button class="btn btn-sm"> Primeira </button>
    </a>
    <a  href = "{{url("lista/".($pagina-1))}}">
        <button class="btn btn-sm"> < </button>
    </a>
    @endif


    <button class="btn btn-sm"> {{$pagina }}</button>


    @if ($pagina != $numPaginas)

            <a  href = "{{url("lista/".($pagina+1))}}">
                <button class="btn btn-sm" > > </button>
            </a>

        <a href="{{url("lista/".$numPaginas)}}">
            <button class="btn btn-sm" > Ultima </button>
        </a>
        @endif
@endif


{{-- mostrar os posts --}}
@foreach ($postagens as $postagem)
@if ( ($postagem->listagem_postagem)=='sim' && ($postagem->avaliacao_doador==NULL ||$postagem->avaliacao_adotante==NULL))

@php
$fotos = ListaController::getFotosAnimal($postagem->cod_postagem);

@endphp

<div class="card">
    <div class="row " id="" class="card-body">
        <div class="col-md-3">
            <a
            href="{{url('/postagem/'.$postagem->cod_postagem)}}">

            @if ($fotos->isEmpty())
                <img id="foto-perfil" src="{{url('img/animal_sem_foto.png')}}"
                alt="Postagem sem foto">
            @else
                <img id="foto-perfil" src="{{url(''.$fotos[0]->link_foto_postagem)}}"
            class="img-fluid rounded">
            @endif
            </a>
        </div>

        <div class="col-md">
            <br>
            {{-- nome --}}
            <a
            href="{{url('/postagem/'.$postagem->cod_postagem)}}">
            <h2>{{$postagem->nome_animal}}</h2>
            </a>
            <div class="row">
                <div class="col">
                    {{-- sexo --}}
                @php
                    echo "Gênero: " .ucfirst($postagem->sexo)."<br>";

                    //{{-- idade --}}

                    if ($postagem->nascimento!=NULL) {
                        $idade=ListaController::calcIdade($postagem->nascimento);
                        if ($idade<1.0) {
                            echo 'Idade: Menos de um ano<br>' ;
                        }
                        elseif ($idade==1.0) {
                            echo 'Idade: 1 ano<br>' ;
                        }
                        else {
                            echo "Idade: ". (int) $idade." anos<br>";
                        }
                    }
                @endphp
                </div>
                <div class="col">
                @php
                    //{{-- Local --}}
                    $Local = ListaController::buscaLocal($postagem->cod_postagem);
                    echo "Local: ".$Local['0']->nome_cidade."<br>";
                @endphp
                    {{-- porte --}}
                    Porte: {{$postagem->tipo_porte}} <br>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endif
@endforeach

{{-- paginação --}}
@if (isset($pesquisa))
    <div class="row">

        @if ($pagina != 1)
            <a style="margin-right:1em" href = "{{ url('/')}}/{{$primeira}} ">
                <button class="btn btn-sm"> Primeira </button>
            </a>
            <a style="margin-right:1em" href = "{{url('/')}}/{{$ant}}">
                <button class="btn btn-sm"> < </button>
            </a>


            {{-- <form class="form"action="{{ url('lista_filtro/'.($pagina-1).'/'.$url[3] )}}" method= "POST" >
                @csrf
                <button class="btn btn-sm" type="submit"> < </button>
                {{-- <input type="hidden" name="Query" value="{{$query}}">
            </form> --}}
        @endif


        <button style="margin-top: 0" class="btn btn-sm"> {{$pagina}}</button>

        @if ($pagina != $numPaginas)
            {{-- <form class="form"action="{{ url('lista_filtro/'.($pagina+1) )}}" method= "POST" >
                @csrf
                <button class="btn btn-sm" type="submit"> > </button>
                {{-- <input type="hidden" name="Query" value="{{$query}}">
            </form> --}}
            <a style="margin-right:1em" href = "{{ url('/')}}/{{$prox}}">
                <button class="btn btn-sm"> > </button>
            </a>
            <a style="margin-right:1em" href = "{{ url('/')}}/{{$ultima}}">
                <button class="btn btn-sm"> Ultima </button>
            {{-- </a>
            <a style="margin-left:1em" href="{{url("lista/".$numPaginas)}}">
                <button class="btn btn-sm" > Ultima </button>
            </a> --}}
        @endif
        {{--
            @if ($pagina != $numPaginas)

            <a href="{{url("lista/".$numPaginas)}}">
                <button class="btn btn-sm" > Ultima </button>
            </a>


        @endif --}}



    </div>
@else
    @if ($pagina != 1)
    <a  href = "{{url("lista/1")}}">
        <button class="btn btn-sm"> Primeira </button>
    </a>
    <a  href = "{{url("lista/".($pagina-1))}}">
        <button class="btn btn-sm"> < </button>
    </a>
    @endif


    <button class="btn btn-sm"> {{$pagina }}</button>


    @if ($pagina != $numPaginas)

            <a  href = "{{url("lista/".($pagina+1))}}">
                <button class="btn btn-sm" > > </button>
            </a>

        <a href="{{url("lista/".$numPaginas)}}">
            <button class="btn btn-sm" > Ultima </button>
        </a>
        @endif
@endif

@endif
<script>

    $(document).ready(function(){
        $('.cidade').hide()

        // var display = document.getElementById('div_cidade').style.display;
        if({{!isset($_GET['cidade']) }}){
            document.getElementById('div_cidade').style.display = 'none';
        }

        // $('.cidade').show()
        // $('[name="cidades"] option').css('display', '');

        // alert('ta ok')
        $('.estado').click(function(){
            let id_estado = $(this).val();
            $('#cidade').val('cidade');
            if (id_estado === 'estado'){
                $("div[name='div_cidade']").hide();
                // alert('aqui tb')
            } else {
                $("div[name='div_cidade']").show();
                // console.log(id_estado)
                $('.cidade').hide()
                $('.' + id_estado).show()
                // alert('dsa');
            }
        })
    })

    $('[value="estado"]').click(function(){

        // ocultando todas
        $('[name="cidades"] option').css('display', 'none');

        // exibindo as do estado selecionado
        $('[name="cidades"] .' + $(this).val()).css('display', '');

    });

</script>
@endsection
