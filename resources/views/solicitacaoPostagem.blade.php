@extends('template')

@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
    

    div button{       
        margin: 2%;
    }
    
    div img{
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
        Solicitar adoção de Totó <br>
    </h3>
    Dono da postagem: José da Silva
    
    <img src="{{url('img/dog.jpeg')}}" class="img-fluid rounded" >
    
    <form action="" class="form">


        <button type="submit" class="btn btn-success ">Solicitar</button>
        <button type="" class="btn btn-danger ">Cancelar</button>
        



    </form>

</div>


    
@endsection