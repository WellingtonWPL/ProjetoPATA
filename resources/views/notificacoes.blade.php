@extends('template')
@section('css')
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
      
<style>
    i {
        font-size: 24px !important;
        vertical-align: middle;
    }

    div a img {
        margin: 2%;
        border-style: solid;
        border-width: 1px;
        border-color: #F5F5F5;
        /* width: 100%; */
        max-height: 150px;
        padding: 10px;


    }

    #campo {
        border-style: solid;
        border-width: 1px;
        border-color: #F5F5F5;
        border-radius: 15px;
        margin-top: 3%;
        /* max-height: 160px; */
        background-color: #FAFAFA;
    }

    #perfil {
        border-width: 1px;
        border-radius: 15px;
        /* margin-top: 15%; */

    }



    div button {
        margin: 2%;
    }

    div img {
        margin: 2%;
        border-style: solid;
        border-width: 1px;
        /* width: 100%; */
        max-height: 250px;
        padding: 10px;


    }
    


    .dot {
        margin-left: 3px;
        height: 25px;
        width: 25px;
        background-color: tomato;
        border-radius: 50%;
        display: inline-block;
    }

    /* #tamanhoContentModal{
        width: 1000px;
        align-content: center;
        margin-left: -50%;
    }

    #conteudoModal{
        width: 100%;
    } */
</style>
@endsection

@section('conteudo')

@php
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ListaController;


$donoPerfil = False;

if (Auth::check()){
    $usuarioLogado =(Auth::user());
    if($usuarioLogado->cod_usuario==$cod_usuario){
        $donoPerfil = True;
    }
}

$avaliacao = PerfilController::getAvaliacao($cod_usuario);
$notificaçoes = PerfilController::getSolicitacoes($cod_usuario);

@endphp




    {{-- postagens --}}

    @php
    $postagens = PerfilController::getPostagens($cod_usuario)
    @endphp



    <div id="campo" align="center">
        <h2>POSTAGENS</h2>
    </div>
    <br>

    @if(count($postagens)==0)
    <div style="text-align: center">

        <b > Nenhuma postagem encontrada... </b>
    </div>

    @else

    @foreach ($postagens as $postagem)
    <div class="card">
        <div class="card-body row">
            <div class="col-3">
                {{-- <a href="{{url('/postagem/'.$postagem->cod_postagem)}}"> --}}
                    <img src="{{url('img/dog.jpeg')}}"
                    class="img-fluid rounded">
                    {{-- </a> --}}
            </div>
            <div class="col-6">
                <a href="{{url('/postagem/'.$postagem->cod_postagem)}}">
                    <h2>{{$postagem->nome_animal}}</h2>
                </a>
                <br>
                {{-- sexo --}}
                {{$postagem->sexo}} <br>

                @php
                if ($postagem->nascimento!=NULL) {

                    $idade=ListaController::calcIdade($postagem->nascimento);
                    if ($idade<1.0) {
                        echo 'Menos de um ano<br>';
                    }elseif ($idade==1.0) {
                        echo '1 ano<br>' ;
                    }else{
                        echo (int) $idade." anos<br>";
                    }
                }
                @endphp

Porte {{$postagem->tipo_porte}} <br>
{{-- Porte {{}} <br> --}}
</div>
<div class="col-3">
    <br><br>

@if ($postagem->avaliacao==NULL)

@else
Avaliação:
    @for ($i = 0; $i < $postagem->avaliacao; $i++)
        <i class=" material-icons">pets</i>
    @endfor
@endif
</div>

</div>
</div>
<br>
@endforeach

@endif


@endsection



