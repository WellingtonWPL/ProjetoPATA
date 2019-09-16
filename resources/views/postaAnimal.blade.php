@php
// dd('oi');
// dd($estados);

use \app\Http\Controllers\PostagemController;

@endphp

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
@php
$url = explode('/', $_SERVER['REQUEST_URI']);
$cod_usuario = $url[1];
@endphp
<body>
    <div class="card">
        {{-- <br> --}}
        <h1 class="m-3">Nova Postagem</h1>
        <div class="card-body">
            {{-- <p class="card-text"></p> --}}
            <form action="/lista" method="POST">
                @csrf
                {{-- {{ csrf_field() }} --}}
                {{-- <form> --}}
                <div class="form-group">
                    <b>Nome</b> <br>
                    <small>Este campo se refere ao nome do animal, caso ele(a) não tenha um você pode colocar algo interessante (ex: Filhote de cachorro)</small>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
                    <div class="col-sm-12 alert alert-danger" id="div_erro_nome" style="display: none; margin-top: 20px;">
                            Informe o nome do animal.
                    </div>
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
                                        <input type="file" id="image" required>
                                        <button type="button" class="btn btn-primary btn-block upload-image" style="margin-top:2%">Selecionar imagem</button>
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
                <div class="row">
                    <div id="sexo" class="form-group col">
                        <b>Sexo</b>
                        <input style="display:none;" type="radio" name="sexo" value="0" checked ><br>
                        <input type="radio" name="sexo" value="macho" > Macho<br>
                        <input type="radio" name="sexo" value="femea"> Fêmea<br>
                        <input type="radio" name="sexo" value="indefinido"> Indefinido
                        <div class="col-sm-12 alert alert-danger" id="div_erro_sexo" style="display: none; margin-top: 20px;">
                                Informe o sexo do animal.
                        </div>
                    </div>

                    <div id="porte" class="form-group col">
                        <b>Porte</b>
                        <input style="display:none;" type="radio" name="porte" value="0" checked><br>
                        <input type="radio" name="porte" value="1" > Pequeno (até 30cm)<br>
                        <input type="radio" name="porte" value="2"> Médio (De 31cm a 80cm)<br>
                        <input type="radio" name="porte" value="3"> Grande (Mais de 80cm)
                        <div class="col-sm-12 alert alert-danger" id="div_erro_porte" style="display: none; margin-top: 20px;">
                                Informe o porte do animal.
                        </div>
                    </div>
                    <div class="form-group col">
                        <b>Espécie</b>
                        <select name="especie" id="especie" class="form-control">
                            <option value="0" selected>Selecione</option>
                            @foreach ($especies as $especie)
                            <option value="{{$especie->cod_especie}}">
                                {{$especie->nome_especie}}</option>
                            @endforeach
                        </select>
                        <div class="col-sm-12 alert alert-danger" id="div_erro_especie" style="display: none; margin-top: 20px;">
                                Informe a espécie do animal.
                        </div>
                    </div>

                </div>

                {{-- DATA NASCIMENTO --}}
                <div class="form-group">
                    <b>Data de Nascimento</b>  <br>
                    <input class="form-control" type="date" name="dataNascimento" value="dataNascimento" id="dataN" required>
                    <div class="col-sm-12 alert alert-danger" id="div_erro_dataN" style="display: none; margin-top: 20px;">
                            Informe a data de nascimento do animal.
                    </div>
                </div>

                {{-- DESCRIÇÃO --}}
                <div class="form-group">
                    <b>Descrição</b> <br>
                    <textarea class="form-control" name="descricao" id="descricao" rows="5"></textarea>
                    <div class="col-sm-12 alert alert-danger" id="div_erro_descricao" style="display: none; margin-top: 20px;">
                            Diga algo sobre o animal.
                    </div>
                </div>

                <div class="row">
                    <div id="castrado" class="form-group col">
                        <b>Castrado(a)</b>
                        <input style="display:none;" type="radio" name="castrado" value="0" checked ><br>
                        <input type="radio" name="castrado" value="sim" > Sim<br>
                        <input type="radio" name="castrado" value="nao"> Não<br>
                        <input type="radio" name="castrado" value="indefinido"> Indefinido
                        <div class="col-sm-12 alert alert-danger" id="div_erro_castrado" style="display: none; margin-top: 20px;">
                                Informe se o animal é castrado.
                        </div>
                    </div>
                    <div id="vacinado" class="form-group col">
                        <b>Vacinação em dia</b>
                        <input style="display:none;" type="radio" name="vacinacao" value="0" checked><br>
                        <input type="radio" name="vacinacao" value="sim" > Sim<br>
                        <input type="radio" name="vacinacao" value="nao"> Não<br>
                        <input type="radio" name="vacinacao" value="indefinido"> Indefinido
                        <div class="col-sm-12 alert alert-danger" id="div_erro_vacinado" style="display: none; margin-top: 20px;">
                                Informe se o animal é vacinado.
                        </div>
                    </div>
                    <div id="vermifugado" class="form-group col">
                        <b>Vermifugado(a)</b>
                        <input style="display:none;" type="radio" name="vermifugado" value="0" checked><br>
                        <input type="radio" name="vermifugado" value="sim" > Sim<br>
                        <input type="radio" name="vermifugado" value="nao"> Não<br>
                        <input type="radio" name="vermifugado" value="indefinido"> Indefinido
                        <div class="col-sm-12 alert alert-danger" id="div_erro_vermifugado" style="display: none; margin-top: 20px;">
                                Informe se o animal é vermifugado.
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <b>Descrição de Saúde</b> <br>
                    <small>Aqui você pode colocar qualquer cuidado especial que o animal precisa</small>
                    <textarea class="form-control" name="descricaoSaude" id="descricaoSaude" rows="5"
                    placeholder="Ex: O animal não possue uma das patas e necessita de cuidados."></textarea>
                    <div class="col-sm-12 alert alert-danger" id="div_erro_descricaoS" style="display: none; margin-top: 20px;">
                            Informe algo sobre a saúde do animal.
                    </div>
                </div>
                <br>
                <div class="form-group">
                        <button class="btn btn-success salva">Postar</button>
                </div>
                <div id="resultado" name="resultado" >
                    
                </div>

                {{-- <button type="submit" class="btn btn-success salva">Postar</button> --}}
            </form>
            {{-- <button type="button" class="btn btn-danger" onclick="salva()">Cancelar</button>
             --}}
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
    var imagens = [];
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
            size:'viewport'
            
        }).then(function (img) {
            if(flag === 1){
                count++;
                img_id++;
                if(count<=1){
                    html = '<div style="" id="img' + img_id + '" class="col-md-2 m-3 teste"><img style="max-width: 100px;" src="' + img + '" /> <span class="close" onclick="deleta(img' + img_id + ')">&times;</span></div>';
                    $("#preview-crop-image").append(html);
                    imagens.push(img);
                }
                else{
                    count = 1;
                    alert("Você só pode inserir uma imagem no sistema!");
                }
            }
        });

    });

    $(".salva").click(function(e){
        //alert("teste");
        e.preventDefault();
        var erro = 0;
        var nome = $("input[name=nome]").val();
        var dataN = $("input[name=dataNascimento]").val();
        var sexo = document.getElementsByName('sexo');
        for(i = 0; i < sexo.length; i++){
            if(sexo[i].checked){
                var op_sexo = sexo[i].value;
            }
        }
        var especie = $("#especie").val();
        var porte = document.getElementsByName('porte');
        for(i = 0; i < porte.length; i++){
            if(porte[i].checked){
                var op_porte = porte[i].value;
            }
        }
        var vermifugado = document.getElementsByName('vermifugado');
        for(i = 0; i < vermifugado.length; i++){
            if(vermifugado[i].checked){
                var op_vermifugado = vermifugado[i].value;
            }
        }
        var castrado = document.getElementsByName('castrado');
        for(i = 0; i < castrado.length; i++){
            if(castrado[i].checked){
                var op_castrado = castrado[i].value;
            }
        }
        var vacinado = document.getElementsByName('vacinacao');
        for(i = 0; i < vacinado.length; i++){
            if(vacinado[i].checked){
                var op_vacinado = vacinado[i].value;
            }
        }
        var descricao1 = $("#descricao").val();
        var descricao2 = $("#descricaoSaude").val();





         if (nome == "") {
             $("#nome").focus();
             $("#nome").css('border-color', 'red');
             $("#div_erro_nome").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_nome").css('display', 'none');
         }
         if (op_sexo == 0) {
             $("#sexo").focus();
             $("#sexo").css('border-color', 'red');
             $("#div_erro_sexo").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_sexo").css('display', 'none');
         }
         if (especie == 0) {
             $("#especie").focus();
             $("#especie").css('border-color', 'red');
             $("#div_erro_especie").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_especie").css('display', 'none');
         }
         if (op_porte == 0) {
             $("#porte").focus();
             $("#porte").css('border-color', 'red');
             $("#div_erro_porte").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_porte").css('display', 'none');
         }
        if (dataN == "") {
             $("#dataN").focus();
             $("#dataN").css('border-color', 'red');
             $("#div_erro_dataN").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_dataN").css('display', 'none');
         }
        if (op_vermifugado == 0) {
             $("#vermifugado").focus();
             $("#vermifugado").css('border-color', 'red');
             $("#div_erro_vermifugado").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_vermifugado").css('display', 'none');
         }
        if (op_castrado == 0) {
             $("#castrado").focus();
             $("#castrado").css('border-color', 'red');
             $("#div_erro_castrado").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_castrado").css('display', 'none');
         }
        if (op_vacinado == 0) {
             $("#vacinado").focus();
             $("#vacinado").css('border-color', 'red');
             $("#div_erro_vacinado").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_vacinado").css('display', 'none');
         }
         if (descricao1 == "") {
             $("#descricao").focus();
             $("#descricao").css('border-color', 'red');
             $("#div_erro_descricao").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_descricao").css('display', 'none');
         }
         if (descricao2 == "") {
             $("#descricaoSaude").focus();
             $("#descricaoSaude").css('border-color', 'red');
             $("#div_erro_descricaoS").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_descricaoS").css('display', 'none');
         }



        if(erro == 0){
            // alert("teste");
            $.ajax({
                url: "/salvaPost",
                type: "POST",
                data: {"nome": nome,
                    "fotos": imagens,
                    "dataN": dataN,
                    "sexo": op_sexo,
                    "porte": op_porte,
                    "especie": especie,
                    "vermifugado": op_vermifugado,
                    "castrado": op_castrado,
                    "vacinado": op_vacinado,
                    "descricao": descricao1,
                    "descricaoSaude": descricao2,
                    },
                // processData: false,
                // cache: false,
                // contentType: false,
                success: function( data ) {
                    //$("#resultado").html(data);
                    //console.log(data);
                    window.location = '/perfil/' + '{{$cod_usuario}}';
                }
                // },
                // error: function (request, status, error) {
                //     alert(request.responseText);
                // }
            });
        }
    });


    function deleta(valor){
        //alert(valor);
        count--;
        $(valor).remove();

    }

</script>



</body>
@endsection

