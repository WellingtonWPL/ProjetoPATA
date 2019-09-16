@extends('template')

@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>


        div button{
            margin: 2%;
        }

        #foto{
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

<div class="card" style="padding:5%; margin-left: 25%; margin-right:25%;">
    <h3>
       {{$postagem->nome_animal}} <br>
    </h3>
    Dono da postagem: <a href="{{url('/perfil/'.$postagem->cod_usuario_postagem)}}">{{$postagem->nome}}</a>

    <img src="{{url('img/dog.jpeg')}}" id="foto"  class="img-fluid rounded" >


    <form action="{{url('/postagem/'.$cod_postagem.'/solicitar')}}" class="form" method="post">
        @csrf

        <input type="submit" class="btn btn-success" Value=" Solicitar">


        {{-- <button type="submit" class="btn btn-success ">Solicitar</button> --}}

        <a href="javascript:history.back()">
            <button type="button" value="Cancelar" class="btn btn-danger ">Cancelar</button>
        </a>
    </form>

</div>



@endsection
