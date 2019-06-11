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
{{-- {{$cod_postagem}} --}}



<div class="row " id="campo">
    <div class="col-6 " style="align:center;">
        <img src="{{url('img/dog.jpeg')}}" class="img-fluid rounded" >

    </div>
    <div class="col-6 ">
        <b>Nome:</b>  Totó <br>
        <b>Sexo:</b>  Macho <br>
        <b>Idade:</b> 4 meses <br>
        <b>Porte:</b> Médio <br>
        <b>Dono da postagem: </b> <a href="#">João da Silva</a><br>
        <b>Avaliação:</b> 
        <i class="material-icons">pets</i>
        <i class="material-icons">pets</i>
        <i class="material-icons">pets</i>
        <i class="material-icons">pets</i>
        <i class="material-icons">pets</i>
        
        
        <br>
        
        <button class="btn btn-success">Solicitar adoção</button>
        
        <button class =" btn btn-danger"> Denunciar</button>    
            
    </div>

</div>
<div class="row" id="campo">
    <div class="container-fluid">
        <h2>Descrição</h2>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem explicabo quidem consequatur, laudantium aut architecto sit voluptatum earum quas facilis eum iste eius ab. Vel tempora minus error nostrum dolorum. 
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum at suscipit neque magnam, nesciunt quia temporibus expedita earum molestiae vero aliquid quidem reprehenderit! Impedit cum repellendus veniam nesciunt obcaecati. Accusamus.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem alias totam vitae est quibusdam nostrum, sint perferendis ullam itaque, voluptate voluptatem molestiae! Nostrum, excepturi culpa quos fuga eligendi corrupti eum.
        
        </p>
    </div>
</div>
<div class="row" id="campo">
    <div class="container-fluid">
        <h2>Descrição Saude</h2>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem explicabo quidem consequatur, laudantium aut architecto sit voluptatum earum quas facilis eum iste eius ab. Vel tempora minus error nostrum dolorum. 
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum at suscipit neque magnam, nesciunt quia temporibus expedita earum molestiae vero aliquid quidem reprehenderit! Impedit cum repellendus veniam nesciunt obcaecati. Accusamus. 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem alias totam vitae est quibusdam nostrum, sint perferendis ullam itaque, voluptate voluptatem molestiae! Nostrum, excepturi culpa quos fuga eligendi corrupti eum.
        </p>
    
    </div>

</div>



@endsection
