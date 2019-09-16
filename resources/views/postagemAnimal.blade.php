@php
    use \App\Http\Controllers\ListaController;
    use \App\Http\Controllers\PerfilController;

    // declaração usada para ver se o animal pode ser adotado
    $adotado= False;
    if ($postagem->cod_usuario_adotante != NULL){
        $adotado = True;
    }

@endphp

@extends('template')

    @section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        #campo {
            border-style: solid;
            border-width: 1px;
            border-color: #F5F5F5;
            border-radius:15px;
            margin-top: 3%;
            /* max-height: 160px; */
            background-color: #FAFAFA;
        }


        div button{
            margin: 2%;
        }

        #foto-postagem{
            margin: 2%;
            border-style: solid;
            border-width: 1px;
            /* width: 100%; */
            max-height: 300px;
            padding:10px;


        }

    </style>
    @endsection


@section('conteudo')



<div class="card">
<div class="card-body">

    <div class="row ">
        <div class="col-6 " style="align:center;">
                <img id="foto-postagem" src="{{url('img/dog.jpeg')}}" class="img-fluid rounded" >

            </div>

            <div class="col-6 ">
                <br>
                @if ($adotado)
                <div class="alert alert-info" role="alert">
                    Esse animal já foi adotado ou está em processo de adoção.
                  </div>
                @endif
                @if($postagem->listagem_postagem=='nao')
                <div class="alert alert-info" role="alert">
                        Essa postagem foi denunciada e está em processo de moderação.
                      </div>
                @endif

                <b>Nome:</b>  {{$postagem->nome_animal}} <br>
                <b>Sexo:</b>  {{$postagem->sexo}} <br>

                <b>Idade:</b>
                @php

        if ($postagem->nascimento!=NULL) {
            // dd($postagem->nascimento);
            $idade=ListaController::calcIdade($postagem->nascimento);
            if ($idade<1.0) {
                echo 'Menos de um ano<br>';
            }elseif ($idade==1.0) {
                echo '1 ano<br>';
                }else{
                    echo (int) $idade." anos<br>";
                }
            }
            @endphp
        <b>Porte:</b> {{$postagem->tipo_porte}} <br>
        <b>Dono da postagem: </b> <a href="{{url('/perfil'.$postagem->cod_usuario_postagem)}}">{{$postagem->nome}}</a><br>
        <b>Avaliação do dono da postagem:</b>

        @if (PerfilController::getAvaliacao($postagem->cod_usuario_postagem) !=NULL)
        @for ($i = 0; $i < (int)PerfilController::getAvaliacao($postagem->cod_usuario_postagem); $i++)
        <i class="material-icons">pets</i>
        @endfor
        @else
        Usuario ainda não avaliado
        @endif


        {{-- <i class="material-icons">pets</i>
        <i class="material-icons">pets</i>
        <i class="material-icons">pets</i>
        <i class="material-icons">pets</i>
        --}}

        <br>
        @if ($adotado ||  $postagem->listagem_postagem=='nao')

        @else

        <a href="{{url('postagem/'.$postagem->cod_postagem.'/solicitar')}}">
            <button class="btn btn-success">Solicitar adoção</button>
        </a>
        <a href="{{url('postagem/'.$postagem->cod_postagem.'/denunciar')}}">
            <button class =" btn btn-danger"> Denunciar</button>
        </a>
        @endif
    </div>

</div>
</div>
</div>

<br>

<div class="card">
    <div class="card-body">

            <div class="row ">
    <div class="container-fluid">
        <h2>Descrição</h2>
        <p>
            {{$postagem->descricao}}

        </p>
    </div>
</div>
</div>
</div>

<br>

<div class="card">
        <div class="card-body">

                <div class="row ">
        <div class="container-fluid">
        <h2>Saúde</h2>

        <p>
            Castrado: {{str_replace("a", "ã", $postagem->castrado)}}
        </p>
        <p>
            Vacinado: {{str_replace("a", "ã", $postagem->vacinacao_em_dia)}}
        </p>
        <p>
            Vermifugado: {{str_replace("a", "ã", $postagem->vermifugado)}}
        </p>
        <h3>Descrição</h3>
        <p>
            {{$postagem->descricao_saude}}
        </p>
    </div>

</div>
</div>
</div>


@endsection
