@extends('template')
   
@section('conteudo')
<head>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<style>
    /* .teste:hover img {
        opacity:0.5;
        cursor: pointer;
    }
    .teste:hover input{
        display: block;
        
    } */
    
    .teste .close {
        position: absolute;
        top: 2px;
        right: -2px;
        z-index: 100;
        background-color: #FFF;
        padding: 5px 2px 2px;
        color: #000;
        font-weight: bold;
        cursor: pointer;
        opacity: .2;
        text-align: center;
        font-size: 22px;
        line-height: 10px;
        border-radius: 50%;
    }
    .teste:hover .close {
        opacity: 1;
    }
 
    
    
</style>      

<body>
    <div class="card">
        {{-- <br> --}}
        <h1 class="m-3">Nova Postagem</h1>
        <div class="card-body">           
            {{-- <p class="card-text"></p> --}}
            <form >
                <div class="form-group">
                    <b>Nome</b> <br>
                    <small>Este campo se refere ao nome do animal, caso ele(a) não tenha um você pode colocar algo interessante (ex: Filhote de cachorro)</small>
                    <input type="text" class="form-control" id="nome" placeholder="Nome" required>    
                </div>

                {{-- FOTO --}}
                <div class="form-group">
                    <b>Foto</b> <br>
                    <div class="container">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <div id="upload-demo"></div>
                                    </div>
                                    <div class="col-md-6" style="padding:5%;">
                                        <strong>Selecione uma imagem para enviar:</strong> 
                                        <input type="file" id="image">
                                        <button class="btn btn-primary btn-block upload-image" style="margin-top:2%">Selecionar imagem</button>
                                        <br>
                                        <div>
                                            <div class="row" id="preview-crop-image" ></div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div id="preview"></div> --}}
                
                {{-- SEXO --}}
                <div class="form-group">
                    <b>Sexo</b> <br>
                    <input type="radio" name="sexo" value="macho" > Macho<br>
                    <input type="radio" name="sexo" value="femea"> Fêmea<br>
                    <input type="radio" name="sexo" value="indefinido"> Indefinido
                </div>

                {{-- DATA NASCIMENTO --}}
                <div class="form-group">
                    <b>Data de Nascimento</b>  <br>       
                    <input class="form-control" type="date" value="dataNascimento" id="">
                </div>

                {{-- DESCRIÇÃO --}}
                <div class="form-group">
                    <b>Descrição</b> <br>
                    <textarea class="form-control" name="descricao" id="" rows="5"></textarea>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <b>Castrado(a)</b> <br>
                        <input type="radio" name="castrado" value="Sim" > Sim<br>
                        <input type="radio" name="castrado" value="Nao"> Não<br>
                        <input type="radio" name="castrado" value="indefinido"> Indefinido
                    </div>
                    <div class="form-group col">
                        <b>Vacinação em dia</b> <br>
                        <input type="radio" name="vacinacao" value="Sim" > Sim<br>
                        <input type="radio" name="vacinacao" value="Nao"> Não<br>
                        <input type="radio" name="vacinacao" value="indefinido"> Indefinido
                    </div>
                    <div class="form-group col">
                        <b>Vermifugado(a)</b> <br>
                        <input type="radio" name="vermifugado" value="Sim" > Sim<br>
                        <input type="radio" name="vermifugado" value="Nao"> Não<br>
                        <input type="radio" name="vermifugado" value="indefinido"> Indefinido
                    </div>    
                </div>

                <div class="form-group">
                    <b>Descrição de Saúde</b> <br>
                    <small>Aqui você pode colocar qualquer cuidado especial que o animal precisa</small>
                    <textarea class="form-control" name="descricaoSaude" id="" rows="5" placeholder="Ex: O animal não possue uma das patas e necessita de cuidados."></textarea>
                </div>
                <br>
            </form>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Postar</button>
        </div>
    </div>
            


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    
    
    var resize = $('#upload-demo').croppie({
        enableExif: true,
        enableOrientation: true,    
        viewport: { 
            width: 250,
            height: 250,
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        },
        
    });
    
    
    var count = 0;
    var flag = 0;
    var img_id = 0;
    $('#image').on('change', function () { 
    var reader = new FileReader();
        reader.onload = function (e) {
        resize.croppie('bind',{
            url: e.target.result
        }).then(function(){
            flag = 1;
            console.log('jQuery bind complete');
        });
        }
        reader.readAsDataURL(this.files[0]);
    });
    
    $('.upload-image').on('click', function (ev) {
        resize.croppie('result', {
            type: 'canvas',
            size:{
                width: 100,
                height: 100
            }
        }).then(function (img) {
        //     $.ajax({
        //         url: "{{route('upload.image')}}",
        //         type: "POST",
        //         data: {"image":img},
        //         success: function (data) {
                    //alert(url);
                    if(flag === 1){
                        count++;
                        img_id++;
                        if(count<=4){
                            html = '<div id="img' + img_id + '" class="col-md-2 m-3 teste"><img  src="' + img + '" /> <span class="close" onclick="deleta(img' + img_id + ')">&times;</span></div>';
                            $("#preview-crop-image").append(html);
                        }
                        else{
                            count = 4;
                            alert("Valor máximo de fotos atingidas");
                        }
                    }
        //         }
        //     });
         });

    });

    
    function deleta(valor){
        //alert(valor);
        count--;
        $(valor).remove();
                
    }

    

   
 
  
    
</script>
      
      
      
</body>
@endsection

