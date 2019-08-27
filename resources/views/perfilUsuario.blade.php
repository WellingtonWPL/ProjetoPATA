@extends('template')
@section('css')
<link rel="stylesheet"
    href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
</style>
@endsection

@section('conteudo')

@php
use App\Http\Controllers\PerfilController;
//  dd($usuario);
$donoPerfil = False;

if (Auth::check()){
    $usuarioLogado =(Auth::user());
    if($usuarioLogado->cod_usuario==$cod_usuario){
        $donoPerfil = True;
    }
}

$avaliacao = PerfilController::getAvaliacao($cod_usuario);


@endphp


<div id="perfil" style="float: right; align:center;">
    <img src="{{url('img/perfil.jpg')}}"
        class="img-fluid rounded">
    <br>
    <div align="center" style="align:center;">
        <b>Avaliação:</b>
        @php
            if ($avaliacao==0) {
                echo 'Sem avaliações';
            }
             for($i =0; $i<$avaliacao; $i++){

                 echo '<i class="material-icons">pets</i>';
             }
        @endphp

    </div>

</div>
<div class="row" id="campo">
    <div style="margin-left: 5%">
        <br><br>
        <b>Nome:</b>
        <h2>{{  $usuario[0]->nome  }}</h2><br>
        <b>Cidade:</b>
        <h4>Ponta Grossa - PR</h4><br>
    </div>
    @if ($donoPerfil==True)

    <div style="margin-left: 2%" class="container-fluid">
        <button class=" btn btn-primary"><i
                class="material-icons"
                style>announcement</i> Notificações</button>
        <button class=" btn btn-alert"><i
                class="material-icons" style>edit</i>
            Editar</button>
        <button class=" btn btn-success"><i
                class="material-icons" style>library_add</i>
            Novo post</button>
        <button class=" btn btn-danger"><i
                class="material-icons" style>delete</i>
            Deletar</button>
    </div>
    @endif
</div>
<div class="row" id="campo">
    <div class="container-fluid">
        <br>
        <h2>Descrição</h2>
        <p>
            {{  $usuario[0]->descricao  }}

        </p>
    </div>
</div>
<div id="campo" align="center">
    <h2>POSTAGENS</h2>
</div>
<div class="row " id="campo">

    <div class="col-3">
        <a href="{{url('/postagem/1')}}">
            <img src="{{url('img/dog.jpeg')}}"
                class="img-fluid rounded">
        </a>
    </div>
    <div class="col-9">
        <a href="{{url('/postagem/1')}}">
            <h2>Totó</h2>
        </a>
        Macho <br>
        4 meses <br>
        Porte médio <br>
    </div>

</div>


<div class="row " id="campo">
    <div class="col-3">
        <a href="{{url('/postagem/1')}}">
            <img src="{{url('img/dog2.jpeg')}}"
                class="img-fluid rounded">
        </a>
    </div>
    <div class="col-9">
        <a href="{{url('/postagem/1')}}">
            <h2>Rex</h2>
        </a>
        Macho <br>
        2 anos <br>
        Porte médio <br>
    </div>

</div>


<div class="row " id="campo">
    <div class="col-3">
        <a href="{{url('/postagem/1')}}">
            <img src="{{url('img/gato.jpeg')}}"
                class="img-fluid rounded">
        </a>
    </div>
    <div class="col-9">
        <a href="{{url('/postagem/1')}}">
            <h2>Miau</h2>
        </a>
        Macho <br>

        Porte pequeno <br>
    </div>

</div>
@endsection