@php
    use \app\Http\Controllers\ListaController;
   
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
            max-height: 160px;
            background-color: #FAFAFA;
        }

        div button{       
            margin: 2%;
        }
        
        div a img{
            margin: 2%;
            border-style: solid;
            border-width: 1px;
            border-color: #F5F5F5;
            /* width: 100%; */
            max-height: 150px;
            padding:10px;
            

        }
        #filtro{
            border-style: solid;
            border-width: 1px;
            margin-top: 5%;
            /* float: left; */
            /* width: 30%;  */

        }

    </style>
    @endsection


@section('conteudo')

    {{-- {{ Form::open(array('action'=>'ListaController@pesquisa')) }}
        {{ Form::text('pesquisa') }}

    {{ Form::close() }} --}}

    <form action="/lista" method="POST">
        @csrf
        <div class="col">
            <div class="input-group-prepend">
            <input  class="form-control" name='pesquisa' id="barraDePesquisa" placeholder="Pesquise aqui">
            <input type="submit" value='submit'>
                <div class="input-group-text"><i class="material-icons">search</i></div>
            </div>
        </div>
        
    </form>



<div id="accordion">
        <div class="align-center">
            <button class="btn btn-default btn-block "
             data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
             style="width: 96%">
            Filtrar
            </button>
        <div id="collapseOne" class="collapse " {{--aria-labelledby="headingOne"--}} data-parent="#accordion">
            <div class="card-body" id="">
                    <form action="">
                        <div class="row">
                            <div class="col">
                                <h4>Estado</h4>
                                <select class="form-control">
                                    <option>PR</option>
                                    <option>SP</option>
                                </select>
                                <h4>Cidade</h4>
                                <select class="form-control">
                                    <option>Ponta Grossa</option>
                                </select>

                            </div>
                            <div class="col">
                            <h4>Espécie</h4>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Cachorro</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Gato</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Cavalo</label>
                            </div>
                            </div>

                            <div class="col">
                            <h4>Idade</h4>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">0-1 ano</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">1-3 anos</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">mais 3 anos</label>
                            </div>
                            </div>

                            <div class="col">
                            <h4>Porte</h4>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Pequeno</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Médio</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Grande</label>
                            </div>
                            </div>
                            
                        </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- mostrar os posts --}}
    @foreach ($postagens as $postagem)
    <div class="card">

    <div class="row " id="" class="card-body">
        <div class="col-3">
            <a href="{{url('/postagem/'.$postagem->cod_postagem)}}">
                    <img src="{{url('img/gato.jpeg')}}" class="img-fluid rounded" >
                </a>
        </div>
        <div class="col-9">
                {{-- nome --}}
                <a href="{{url('/postagem/'.$postagem->cod_postagem)}}"><h2>{{$postagem->nome_animal}}</h2> </a>
                {{-- sexo --}}
                {{$postagem->sexo}} <br>   
                {{-- idade --}}
                @php
                    if ($postagem->nascimento!=NULL) {

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

                {{-- porte --}}
                Porte {{$postagem->tipo_porte}} <br>
        </div>

    </div>
    </div>
    <br>
    @endforeach

            
@endsection

