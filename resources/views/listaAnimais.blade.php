@php
// dd('oi');
// dd($estados);

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
        width: 80%;
        max-height: 200px;
        padding: 15px;
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


<form action="/lista" method="POST">
    @csrf
    {{-- <div class="col"> --}}
    {{-- <div class="input-group-prepend"> --}}
    <input class="form-control" name='pesquisa'
           id="barraDePesquisa" placeholder="Pesquise aqui">
    <br>
    {{-- <div class="input-group-text"><i class="material-icons">search</i></div> --}}
    {{-- </div> --}}
    {{-- </div> --}}

    {{-- <div id="accordion">
				<div class="align-center">
						<button class="btn btn-default btn-block "
						 data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
						 style="width: 96%">  --}}
    <h4>Filtro</h4>
    {{-- </button> --}}
    {{-- <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body" id=""> --}}

    <div class="row">
        <div class="col">
            Estado
            <select name="estado" class="estado form-control">
                <option value="estado" selected>Selecione</option>
                @foreach ($estados as $estado)
                <option value="{{ $estado->cod_estado }}">
                        {{$estado->sigla_estado}}
                </option>
                @endforeach
            </select>
            <div name="div_cidade" style="display: none;">
                Cidade
                <select name="cidade" id="cidade" class="form-control">
                    <option value="cidade" selected>Selecione</option>
                    @foreach ($cidades as $cidade)
                    <option class="cidade {{$cidade->cod_estado}}"
                            value="{{$cidade->cod_cidade}}">
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
                <option value="{{$especie->cod_especie}}">
                    {{$especie->nome_especie}}</option>
                @endforeach
                {{-- <option>Ponta Grossa</option> --}}
            </select>

        </div>

        <div class="col">
            Idade
            <div class="form-check">
                <input type="checkbox"
                    class="form-check-input"
                    id="exampleCheck1" name="0-1"
                    value="0-1">
                <label class="form-check-label"
                    for="exampleCheck1">0-1 ano</label>
            </div>
            <div class="form-check">
                <input type="checkbox"
                    class="form-check-input"
                    id="exampleCheck1" name="1-3"
                    value="1-3">
                <label class="form-check-label"
                    for="exampleCheck1">1-3 anos</label>
            </div>
            <div class="form-check">
                <input type="checkbox"
                    class="form-check-input"
                    id="exampleCheck1" name="3+" value="3+">
                <label class="form-check-label"
                    for="exampleCheck1">mais 3 anos</label>
            </div>
        </div>

        <div class="col">
            Porte
            <div class="form-check">
                <input type="checkbox"
                    class="form-check-input" name="pequeno"
                    value="1">
                <label class="form-check-label"
                    for="exampleCheck1">Pequeno</label>
            </div>
            <div class="form-check">
                <input type="checkbox"
                    class="form-check-input" name="medio"
                    value="2">
                <label class="form-check-label"
                    for="exampleCheck1">Médio</label>
            </div>
            <div class="form-check">
                <input type="checkbox"
                    class="form-check-input" name="grande"
                    value="3">
                <label class="form-check-label"
                    for="exampleCheck1">Grande</label>
            </div>
        </div>

    </div>

    <br>

    <input type="submit" value='Pesquisar'
        class="btn btn-primary">

</form>
<br>

{{-- mostrar os posts --}}
@foreach ($postagens as $postagem)
@if ( ($postagem->listagem_postagem)=='sim' && $postagem->avaliacao==NULL)

@php
$fotos = ListaController::getFotosAnimal($postagem->cod_postagem);

@endphp

<div class="card">
    <div class="row " id="" class="card-body">
        <div class="col-3">
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

        <div class="col-6">
            <br>
            {{-- nome --}}
            <a
            href="{{url('/postagem/'.$postagem->cod_postagem)}}">
            <h2>{{$postagem->nome_animal}}</h2>
            </a>
            <div class="row">
                <div class="col-3">
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
                <div class="col-4">
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

<script>

    $(document).ready(function(){
        $('.cidade').hide()
         //alert('ta ok')
        $('.estado').click(function(){
            let id_estado = $(this).val();
            $('#cidade').val('cidade');
            if (id_estado === 'estado'){
                $("div[name='div_cidade']").hide();
            } else {
                $("div[name='div_cidade']").show();
                // console.log(id_estado)
                $('.cidade').hide()
                $('.' + id_estado).show()
                //  alert('dsa');
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
