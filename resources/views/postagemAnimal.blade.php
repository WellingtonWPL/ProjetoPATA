@php
    use \App\Http\Controllers\ListaController;
    use \App\Http\Controllers\PerfilController;

    // dd(2);
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




<div class="row " id="campo">
    <div class="col-6 " style="align:center;">
        <img src="{{url('img/dog.jpeg')}}" class="img-fluid rounded" >

    </div>
    
    <div class="col-6 ">
        <br>
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
        <a href="{{url('postagem/'.$postagem->cod_postagem.'/solicitar')}}"> 
            <button class="btn btn-success">Solicitar adoção</button>
        </a>
        <a href="{{url('postagem/'.$postagem->cod_postagem.'/denunciar')}}">
            <button class =" btn btn-danger"> Denunciar</button>    
        </a>
            
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
