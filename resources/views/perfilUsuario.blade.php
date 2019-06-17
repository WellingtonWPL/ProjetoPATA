@extends('template')
@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        i {
            font-size: 24px !important;
            vertical-align:middle;
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

    #campo {
        border-style: solid;
        border-width: 1px; 
        border-color: #F5F5F5;
        border-radius:15px;
        margin-top: 3%;
        /* max-height: 160px; */
        background-color: #FAFAFA;
    }

    #perfil {
        border-width: 1px; 
        border-radius:15px;
        /* margin-top: 15%; */
        
    }



    div button{       
        margin: 2%;
    }

    div img{
        margin: 2%;
        border-style: solid;
        border-width: 1px;
        /* width: 100%; */
        max-height: 250px;
        padding:10px;
        

    }

    </style>
@endsection

@section('conteudo')
<div id="perfil"  style="float: right; align:center;">
    <img src="{{url('img/perfil.jpg')}}" class="img-fluid rounded" >
    <br>
    <div align="center" style="align:center;">
        <b>Avaliação:</b> 
            <i class="material-icons">pets</i>
            <i class="material-icons">pets</i>
            <i class="material-icons">pets</i>
            <i class="material-icons">pets</i>
            <i class="material-icons">pets</i>
    </div>
    
</div>
<div class="row" id="campo">
    <div style="margin-left: 5%" >
        <br><br>
        <b>Nome:</b><h2>Pedro Brandalise</h2><br>
        <b>Cidade:</b><h4>Ponta Grossa - PR</h4><br>
    </div> 
    <div style="margin-left: 2%" class="container-fluid"> 
        <button class=" btn btn-primary"><i class="material-icons" style>announcement</i> Notificações</button> 
        <button class=" btn btn-alert"><i class="material-icons" style>edit</i> Editar</button> 
        <button class=" btn btn-success"><i class="material-icons" style>library_add</i> Novo post</button>
        <button class=" btn btn-danger"><i class="material-icons" style>delete</i> Deletar</button>            
    </div>
</div>
<div class="row" id="campo">
    <div class="container-fluid">
        <br>
        <h2>Descrição</h2>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem explicabo quidem consequatur, laudantium aut architecto sit voluptatum earum quas facilis eum iste eius ab. Vel tempora minus error nostrum dolorum. 
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum at suscipit neque magnam, nesciunt quia temporibus expedita earum molestiae vero aliquid quidem reprehenderit! Impedit cum repellendus veniam nesciunt obcaecati. Accusamus.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem alias totam vitae est quibusdam nostrum, sint perferendis ullam itaque, voluptate voluptatem molestiae! Nostrum, excepturi culpa quos fuga eligendi corrupti eum.
        
        </p>
    </div>
</div>
<div id="campo" align="center">
    <h2>POSTAGENS</h2>
</div>
<div class="row " id="campo">

        <div class="col-3">
            <a href="{{url('/postagem/1')}}">
                    <img src="{{url('img/dog.jpeg')}}" class="img-fluid rounded" >
                </a>
        </div>
        <div class="col-9">
                <a href="{{url('/postagem/1')}}"><h2>Totó</h2> </a>
                Macho <br>
                4 meses <br>
                Porte médio <br>
        </div>

    </div>
        

    <div class="row " id="campo">
        <div class="col-3">
            <a href="{{url('/postagem/1')}}">
                    <img src="{{url('img/dog2.jpeg')}}" class="img-fluid rounded" >
                </a>
        </div>
        <div class="col-9">
                <a href="{{url('/postagem/1')}}"><h2>Rex</h2> </a>
                Macho <br>
                2 anos <br>
                Porte médio <br>
        </div>

    </div>


    <div class="row " id="campo">
        <div class="col-3">
            <a href="{{url('/postagem/1')}}">
                    <img src="{{url('img/gato.jpeg')}}" class="img-fluid rounded" >
                </a>
        </div>
        <div class="col-9">
                <a href="{{url('/postagem/1')}}"><h2>Miau</h2> </a>
                Macho <br>
                
                Porte pequeno <br>
        </div>

    </div>
@endsection