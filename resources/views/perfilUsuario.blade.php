@extends('template')
@section("titulo", "Perfil de Usuário")
@section('css')

<head>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<style>
    i {
        font-size: 24px !important;
        vertical-align: middle;
    }

    #foto {
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

    #foto {
        margin: 2%;
        border-style: solid;
        border-width: 1px;
        /* width: 100%; */
        max-height: 250px;
        padding: 10px;


    }

    #foto_user{
        margin: 2%;
        /* border-style: solid; */
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
$foto_usuario = PerfilController::getFotoUsuario($cod_usuario);
//dd($foto_usuario->link_foto_usuario);

@endphp


<div id="perfil" style="float: right; align:center;">
    <div class="col-12">
            @if ($foto_usuario==NULL)
                <img src="{{url('img/animal_sem_foto.png')}}" id="foto_user"  class="" >
                
            @else
                <img src="{{url(''.$foto_usuario->link_foto_usuario)}}" id="foto_user"  class="img-fluid rounded" >
            @endif
            {{-- </a> --}}
    </div>
    <br>
    <div align="center" style="align:center; color:black;">
        <b>Avaliação:</b>
        @php
            if ($avaliacao==0) {
            echo 'Sem avaliações';
            }
            for($i =0; $i<$avaliacao; $i++){
            echo '<i class="material-icons">pets</i>' ;
            }
        @endphp
    </div>
</div>
<div class=" card" >
    <div  class="card-body" style="margin-left: 5%">
        <br><br>
        <b>Nome:</b>
        <h2>{{  $usuario[0]->nome  }}</h2><br>
        <b>Cidade:</b>
        @php

            // dd($usuario[0]->cod_cidade);
            $cidade =
            PerfilController::getCidade($usuario[0]->cod_cidade);
            // dd('dsa')
        @endphp

        <h4>{{$cidade[0]}} - {{$cidade[1]}}</h4><br>

    </div>
    {{-- mostrar os botões de ações --}}
    @if ($donoPerfil==True)

        <div style="margin-left: 2%"
            class="container-fluid">
            <a
                href="{{url($cod_usuario.'/solicitacoes')}}">
                <button class="btn btn-primary"><i
                        class="material-icons"
                        style>announcement</i>
                    Solicitações <span
                        class="dot">{{ $notificaçoes }}</span></button>

            </a>
            <a
                href="{{url('perfil/'.$cod_usuario.'/editar')}}">

                <button class="btn btn-alert"><i
                        class="material-icons"
                        style>edit</i>
                    Editar</button>
            </a>
            <a href="{{url($cod_usuario.'/postar')}}">
                <button class=" btn btn-success"><i
                        class="material-icons"
                        style>library_add</i>
                    Novo post</button>
            </a>


            <button class=" btn btn-danger"
                type="button" data-toggle="modal"
                data-target="#myModal">
                <i class="material-icons"
                    style>delete</i>
                Deletar</button>



        </div>
    @endif
</div>
<br>
<div class="card" >
    <div class="card-body">
        <br>
        <h2>Descrição:</h2>
        <p>
            {{  $usuario[0]->descricao  }}

        </p>
    </div>
</div>


    {{-- modal --}}

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            {{-- header modal --}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                        data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Você tem certeza
                        que quer excluir sua conta? </h4>
                    <br>
                </div>
                {{-- corpo modal --}}

                <div class="modal-body">
                    <form
                        action="{{url('/perfil/'.$cod_usuario.'/excluir')}}"
                        method="POST">
                        @csrf
                        (Você poderá recuperá-la no futuro.)
                        <br>

                        {{-- <input type="submit" class="btn btn btn-lg " value= "Sim">

                    <input type="cancel" class="btn btn-default" value= "Não"> --}}

                        <button class="btn btn-danger"
                            type="submit">Sim</button>
                        {{-- <button  class="btn btn-default"  >Não</button> --}}
                        <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal"
                            aria-hidden="true">Não</button>
                    </form>

                </div>
            </div>


            {{-- footer do modal --}}
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
            </div>
        </div>

    </div>
    {{-- </div>
    </div> --}}




    {{-- postagens --}}

    @php
    $postagens =
    PerfilController::getPostagens($cod_usuario)
    @endphp


    <br>
    <div class="card" >
        <div class="card-header">
            <h2>Animais publicados</h2>
        </div>
    </div>
    <br>

    @if(count($postagens)==0)
    <div style="text-align: center">

        <b> Nenhuma postagem encontrada... </b>
    </div>

    @else

    @foreach ($postagens as $postagem)
        @if($postagem->listagem_postagem=='sim')
            @php
                $foto =
                \DB::table('Foto_postagem')->where('cod_postagem',
                $postagem->cod_postagem)->first();
            @endphp
        <div class="card">
            <div class="card-body row">
                <div class="col-md">
                    {{-- <a href="{{url('/postagem/'.$postagem->cod_postagem)}}">
                    --}}
                    @if ($foto==NULL)
                        <img src="{{url('img/animal_sem_foto.png')}}"
                        id="foto" class="">

                    @else
                        <img src="{{url                         (''.$foto->link_foto_postagem)}}"
                        id="foto" class="img-fluid rounded">
                    @endif
                    {{-- </a> --}}
                </div>
                <div class="col">
                    <a
                        href="{{url('/postagem/'.$postagem->cod_postagem)}}">
                        <h2>{{$postagem->nome_animal}}</h2>
                    </a>
                    <br>
                    {{-- sexo --}}
                    {{$postagem->sexo}} <br>

                    @php
                        if ($postagem->nascimento!=NULL) {

                        $idade=ListaController::calcIdade($postagem->nascimento);
                        if ($idade<1.0) { echo 'Menos de um ano<br>'
                            ; }elseif ($idade==1.0) {
                            echo '1 ano<br>' ; }else{ echo (int)
                            $idade." anos<br>";
                            }
                            }
                    @endphp

                        Porte {{$postagem->tipo_porte}} <br>
                        {{-- Porte {{}} <br> --}}
                </div>
                <div class="col">
                    <br><br>

                    @if ($postagem->avaliacao_doador==NULL)
                        Não avaliado ainda
                    @else
                        Avaliação recebida:
                        <br>
                        @for ($i = 0; $i < $postagem->avaliacao_doador;
                            $i++)
                            <i class=" material-icons">pets</i>
                        @endfor
                    @endif
                </div>

            </div>
        </div>
        <br>
        @endif
    @endforeach

<div class="card">
    <div class="card-body">

        <h2>Animais adotados</h2>
    </div>


</div>
<br>

    @php
        $postagens =PerfilController::getPostagensCompletadas($cod_usuario);
        // dd($postagens);
    @endphp

    @endif

@foreach ($postagens as $postagem)
@if($postagem->listagem_postagem=='sim')
@php
$foto =
\DB::table('Foto_postagem')->where('cod_postagem',
$postagem->cod_postagem)->first();
@endphp
<div class="card">
    <div class="card-body row">
        <div class="col">
            {{-- <a href="{{url('/postagem/'.$postagem->cod_postagem)}}">
            --}}
            @if ($foto==NULL)
            <img src="{{url('img/animal_sem_foto.png')}}"
                id="foto" class="">

            @else
            <img src="{{url(''.$foto->link_foto_postagem)}}"
                id="foto" class="img-fluid rounded">
            @endif
            {{-- </a> --}}
        </div>
        <div class="col">
            <a
                href="{{url('/postagem/'.$postagem->cod_postagem)}}">
                <h2>{{$postagem->nome_animal}}</h2>
            </a>
            <br>
            {{-- sexo --}}
            {{$postagem->sexo}} <br>

            @php
                if ($postagem->nascimento!=NULL) {

                $idade=ListaController::calcIdade($postagem->nascimento);
                if ($idade<1.0) { echo 'Menos de um ano<br>'
                    ; }elseif ($idade==1.0) {
                    echo '1 ano<br>' ; }else{ echo (int)
                    $idade." anos<br>";
                    }
                    }
            @endphp

                Porte {{$postagem->tipo_porte}} <br>
                {{-- Porte {{}} <br> --}}
        </div>
        <div class="col-3">
            <br><br>

            @if ($postagem->avaliacao_adotante==NULL)

            @else
            Avaliação recebida:
                        <br>
                        @for ($i = 0; $i < $postagem->avaliacao_adotante;
                            $i++)
                            <i class=" material-icons">pets</i>
                        @endfor
            @endif
        </div>

    </div>
</div>
<br>
@endif
@endforeach


    @endsection
