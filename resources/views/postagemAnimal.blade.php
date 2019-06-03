@extends('template')

<style>
    div.row {
        /* border-style: solid;
        border-width: 1px; */
        margin-top: 3%
    }

    div button{
        
        margin: 2%;
    }

    div img{
        
        border-style: solid;
        border-width: 1px;
        /* width: 100%; */
        max-height: 300px;
        padding:10px;
        

    }

 </style>
@section('conteudo')
{{-- {{$cod_postagem}} --}}



<div class="row ">
    <div class="col-6 " style="align:center;">
        <img src="{{url('img/dog.jpeg')}}" class="img-fluid rounded" >

    </div>
    <div class="col-6 ">
        <b>Nome:</b>  Totó <br>
        <b>Sexo:</b>  Macho <br>
        <b>Idade:</b> 4 meses <br>
        <b>Porte:</b> Médio <br>
        <b>Dono da postagem: </b> <a href="#">João da Silva</a><br>
        
        <button class="btn btn-success">Solicitar adoção</button>
        
        <button class =" btn btn-danger"> Denunciar</button>    
            
    </div>

</div>
<div class="row">
    <div class="container-fluid">
        <h2>Descrição</h2>
        <p>
            euifeiuwfhaefhaeluin
            fheaihuiefaw
            fheahfuieaw fheoawhfeua
            hfeafheoaw fhewuahfeuioaw feawuifheai
        </p>
    </div>
</div>
<div class="row">
    <div class="container-fluid">
        <h2>Descrição Saude</h2>
        <p>
            fhifewh  feuywf uewo fewyuf gewyi
            fewuihewuf hfeuifew
            hf ewuhf e fhufwefhwe
            hfueohfeui
        </p>
    
    </div>

</div>



@endsection
