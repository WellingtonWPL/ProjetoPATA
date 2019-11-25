@php
    use \App\Http\Controllers\ListaController;
    use \App\Http\Controllers\PerfilController;
    use \App\Http\Controllers\PostagemController;

    // declaração usada para ver se o animal pode ser adotado
    $adotado= False;
    if ($postagem->cod_usuario_adotante != NULL){
        $adotado = True;
    }
    $usuario = Auth::user();
    // dd($usuario);

@endphp

@extends('template')
@section("titulo", "Animal para Adoção")

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

@php
    // dd($foto);
@endphp


<div class="card">
<div class="card-body">

    <div class="row ">
        <div class="col-md-4 " style="align:center;">
            @if ($foto==NULL)
            <img id="foto-postagem" src="{{url('img/animal_sem_foto.png')}}" class="img-fluid rounded" >
            @else
                <img id="foto-postagem" src="{{url($foto->link_foto_postagem)}}" class="img-fluid rounded" >
            @endif
            </div>

            <div class="col-md " style="float: left;">
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
                <b>Sexo:</b> 
                @if ($postagem->sexo == "macho")
                    Macho<br>
                @elseif ($postagem->sexo == "femea")
                    Fêmea<br>
                @else
                    Indefinido<br>
                @endif

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
        else{
            echo 'Indefinido<br>';
        }
            @endphp
        <b>Porte:</b> {{$postagem->tipo_porte}} <br>
        <b>Dono da postagem: </b> <a href="{{url('/perfil/'.$postagem->cod_usuario_postagem)}}">{{$postagem->nome}}</a><br>
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
            @if ($usuario!=null && $usuario->cod_usuario == $postagem->cod_usuario_postagem)
                <a href="{{url('postagem/'.$postagem->cod_postagem.'/editar')}}">
                    <button type="button" class="btn btn-primary">Editar</button>
                </a>

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo2">
                    Excluir
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="modalExemplo2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Você tem certeza que quer excluir essa postagem?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-footer">
                        <a href="{{url('postagem/'.$postagem->cod_postagem.'/excluir')}}">
                            <button type="button" class="btn btn-primary">Sim</button>
                        </a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>

                        </div>
                      </div>
                    </div>
                  </div>




            @else
            <a href="{{url('postagem/'.$postagem->cod_postagem.'/solicitar')}}">
                <button class="btn btn-success">Solicitar adoção</button>
            </a>
            <a href="{{url('postagem/'.$postagem->cod_postagem.'/denunciar')}}">
                <button class =" btn btn-danger"> Denunciar</button>
            </a>
            @endif
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
            @php
                $descricao = PostagemController::getDescricaoAnimal($postagem->cod_postagem);   
            @endphp
            {{$descricao}}

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

@section('titulo_help')
Pagina de uma postagem
@endsection

@section('help')
Página onde será mostrada as informações do animal que está registrado no sistema e as ações a serem tomadas pelo usuário em relação ao animal.
As informações mostradas são:  <br>
Nome: o nome do animal. <br>
Sexo: o sexo (se souber) do animal. <br>
Idade: a idade do animal. <br>
Porte: o porte do animal. <br>
Dono da postagem: qual usuario postou o animal. <br>
Avaliação do dono da postagem: a avaliação que o dono da postagem tem no site. <br>
Descrição: Descrição do animal. <br>
Saúde: descreve diversos aspectos da saúde do animal. <br>
E as ações que o usuário pode tomar: <br>
Solicitar adoção: realiza uma solicitação ao dono da postagem mostrando o interesse em adotar o animal. <br>
Denunciar: denuncia a postagem tirando-a da listagem. <br>
Acessar perfil do dono da postagem: redireciona o usuário ao dono da postagem. <br>

@endsection
