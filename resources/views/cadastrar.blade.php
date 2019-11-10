@extends('template')
@section("titulo", "Cadastro de Novo Usuário")
@section('conteudo')

@php
@endphp

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
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

<script type="text/javascript">
(function ( $ ){
    $(function(){
        //Máscaras
        var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

        $('#fone').mask(SPMaskBehavior, spOptions);
    });
})( jQuery);
</script> 

<body> 

    <div class="card" style="padding:5%;">
    <h1>Cadastro</h1>  
    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="row form-group">
            <div class="form-group col-md-6">
                    <b> Nome</b>
                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nome" id="nome" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome">
                <div class="col-md-6">
                    @if ($errors->has('nome'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-sm-12 alert alert-danger" id="div_erro_nome" style="display: none; margin-top: 20px;">
                        Informe o seu Nome.
                </div>
            </div>
            <div class="form-group col-md-6">
                    <b> Sobrenome</b>
                <input type="text" class="form-control{{ $errors->has('sobrenome') ? ' is-invalid' : '' }}" name="sobrenome" id="sobrenome" value="{{ old('sobrenome') }}" required autocomplete="sobrenome" autofocus placeholder="Sobrenome">
                <div class="col-md-6">
                    @if ($errors->has('sobrenome'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sobrenome') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-sm-12 alert alert-danger" id="div_erro_sobrenome" style="display: none; margin-top: 20px;">
                        Informe o seu Sobrenome.
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-6">
                    <b>E-mail</b>
                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" id="email" placeholder="email" required>
                <div class="col-md-6">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-sm-12 alert alert-danger" id="div_erro_email" style="display: none; margin-top: 20px;">
                        Informe o seu Email.
                </div>
            </div>
            <div class="form-group col-md-6">
                    <b>Celular</b>
                <input id="fone" type="text" name="fone" class="form-control" placeholder="(99) 9999-9999"required>
                <div class="col-sm-12 alert alert-danger" id="div_erro_fone" style="display: none; margin-top: 20px;">
                        Informe o número do seu Celular.
                </div>
            </div>
        </div>
        <div class="form-group">
                <b>Contato</b>
                <input id="contato" type="text" name="contato" class="form-control" required placeholder="Ex: WhatsApp - (99) 99999-9999 ou E-mail - pata@pata.com">
                <small id="contatoHelp" class="form-text text-muted">Aqui você deve inserir sua forma de contato para o doador poder conversar com você. </small>
                <div class="col-sm-12 alert alert-danger" id="div_erro_contato" style="display: none; margin-top: 20px;">
                        Informe o seu modo de Contato.
                </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-6">
                    <b> Senha</b>
                <input id="senha" type="password" class="form-control{{ $errors->has('senha') ? ' is-invalid' : '' }}" name="senha" required autocomplete="new-password" placeholder="Senha">
                <small id="emailHelp" class="form-text text-muted">mínimo 8 caracteres</small>
                @if ($errors->has('senha'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('senha') }}</strong>
                    </span>
                @endif
                <div class="col-sm-12 alert alert-danger" id="div_erro_senha" style="display: none; margin-top: 20px;">
                        Informe a sua Senha.
                </div>
            </div>
            <div class="form-group col-md-6">
                    <b>Repetir senha</b>
                <input id="password_confirmation" type="password" placeholder="senha" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <small id="emailHelp" class="form-text text-muted">mínimo 8 caracteres</small>
                <span id='message'></span>
                <div class="col-sm-12 alert alert-danger" id="div_erro_password_confirmation" style="display: none; margin-top: 20px;">
                        Informe a sua Senha Novamente.
                </div>
            </div>
        </div>
    
        <div class="form-group row">
            <div class="form-group col-md-6">
                <b>Estado</b>
                <select class="estado form-control" id="estado">
                    <option value="0" selected>Selecione
                    </option>
                    @foreach ($estados as $estado)
                    <option value="{{ $estado->cod_estado }}">
                            {{$estado->nome_estado}} - {{$estado->sigla_estado}}</option>
                    @endforeach
                </select>
                <div class="col-sm-12 alert alert-danger" id="div_erro_estado" style="display: none; margin-top: 20px;">
                        Informe o seu Estado.
                </div>
            </div> 
            <div class="form-group col-md-6">
                <b>Cidade</b>
                <select name="cidade" id="cidade" class="form-control">
                    <option selected value="0">Selecione</option>
                    @foreach ($cidades as $cidade)
                    <option
                        class="cidade {{$cidade->cod_estado}}"
                        value="{{$cidade->cod_cidade}}" >
                        {{$cidade->nome_cidade}}</option>
                    @endforeach
                </select>
                <div class="col-sm-12 alert alert-danger" id="div_erro_cidade" style="display: none; margin-top: 20px;">
                        Informe a sua Cidade.
                </div>
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
        <div class="form-group">
            <b>Descrição pessoal</b>
            <textarea name="desc" id="desc" class="form-control" placeholder="Você poderá editar este campo depois! ;)" rows="5" ></textarea>
            <div class="col-sm-12 alert alert-danger" id="div_erro_descricao" style="display: none; margin-top: 20px;">
                    Informe uma descrição sua.
            </div>
        </div>
        <div class="form-group">
                <button class="btn btn-success salva">Cadastrar</button>

        </div>


        <div id="resultado" name="resultado">

        </div>
    </form>
    <div class="alert alert-warning" role="alert" id="alerta_senha" name="alerta_senha" style="display: none" >
        As senhas devem der iguais!
    </div>
    <div class="alert alert-warning" role="alert" id="alerta_email" name="alerta_email" style="display: none" >
        O seu email parece ser inválido! 
    </div>
    <div class="alert alert-warning" role="alert" id="alerta_senha2" name="alerta_senha2" style="display: none" >
        A sua senha parece ter menos carácteres que o exigido! 
    </div>
    <div class="alert alert-warning" role="alert" id="alerta_email2" name="alerta_email2" style="display: none" >
        O email informado já está cadastrado! 
    <div class="form-group">
            <b>Descrição pessoal</b>
        <textarea name="desc" class="form-control" placeholder="Você poderá editar este campo depois! ;)" rows="5"
        maxlength="65535"
        ></textarea>
    </div>


</div> 
</body>


<script>
    // Compara as Senhas
    
    $(document).ready(function(){
        $('#password_confirmation, #senha').keyup(function () {
            // alert('ok')
            if ($('#senha').val() == $('#password_confirmation').val()) {
                $('#message').html(' As senhas conferem! &#10004').css('color', 'green');
            } else
                $('#message').html('As senhas NÃO conferem! &#10006 ').css('color', 'red');
        });
    })
</script>
    


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
            type: 'circle'
        },
        boundary: {
            width: 300,
            height: 300
        },

    });

    var erro = 0;
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
        
        var nome = $("input[name=nome]").val();
        var sobrenome = $("input[name=sobrenome]").val();
        var nome_completo = nome + " " + sobrenome;
        var celular = $("input[name=fone]").val();
        var email = $("input[name=email]").val();
        var contato = $("input[name=contato]").val();
        var senha = $("input[name=senha]").val();
        var senha2 = $("input[name=password_confirmation]").val();
        var estado = $("#estado").val();
        var cidade = $("#cidade").val();
        var desc = $("#desc").val();

        if(email.includes("@")){
            erro = 0;
            $("#alerta_email").css('display', 'none');
        }
        else{
            erro = 1
            $("#alerta_email").css('display', 'block');
        }
        if(senha.length < 8){
            erro = 1;
            $("#alerta_senha2").css('display', 'block');
        }
        else{
            erro = 0;
            $("#alerta_senha2").css('display', 'none');
        }

        if(senha !== senha2){
            erro = 1;
            $("#alerta_senha").css('display', 'block');
        }else{
            erro = 0;
            $("#alerta_senha").css('display', 'none');
        }

         if (nome == "") {
             $("#nome").focus();
             $("#nome").css('border-color', 'red');
             $("#div_erro_nome").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_nome").css('display', 'none');
         }
         if (sobrenome == "") {
             $("#sobrenome").focus();
             $("#sobrenome").css('border-color', 'red');
             $("#div_erro_sobrenome").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_sobrenome").css('display', 'none');
         }
         if (email == "") {
             $("#email").focus();
             $("#email").css('border-color', 'red');
             $("#div_erro_email").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_email").css('display', 'none');
         }
         if (celular == "") {
             $("#fone").focus();
             $("#fone").css('border-color', 'red');
             $("#div_erro_fone").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_fone").css('display', 'none');
         }
        if (contato == "") {
             $("#contato").focus();
             $("#contato").css('border-color', 'red');
             $("#div_erro_contato").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_contato").css('display', 'none');
         }
        if (senha == "") {
             $("#senha").focus();
             $("#senha").css('border-color', 'red');
             $("#div_erro_senha").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_senha").css('display', 'none');
         }
         if (senha2 == "") {
             $("#password_confirmation").focus();
             $("#password_confirmation").css('border-color', 'red');
             $("#div_erro_password_confirmation").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_senha2").css('display', 'none');
         }
         if (cidade == 0) {
             $("#cidade").focus();
             $("#cidade").css('border-color', 'red');
             $("#div_erro_cidade").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_cidade").css('display', 'none');
         }
         if (estado == 0) {
             $("#estado").focus();
             $("#estado").css('border-color', 'red');
             $("#div_erro_estado").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_estado").css('display', 'none');
         }
         if (desc == "") {
             $("#desc").focus();
             $("#desc").css('border-color', 'red');
             $("#div_erro_descricao").css('display', 'block');
             erro = 1;
         }
         else {
             $("#div_erro_descricao").css('display', 'none');
         }
         

        if(erro == 0){
            // alert("teste");
            $.ajax({
                url: "/register",
                type: "POST",
                data: {"nome": nome_completo,
                    "fotos": imagens,
                    "email": email,
                    "fone": celular,
                    "contato": contato, 
                    "senha": senha, 
                    "cidade": cidade,
                    "password_confirmation": senha2,
                    "desc": desc,
                    },
                // processData: false,
                // cache: false,
                // contentType: false,
                success: function( data ) {
                    //$("#resultado").html(data);
                    //console.log(data);
                    $("#alerta_email2").css('display', 'none');
                    window.location = '/lista';
                   
                },
                error: function( data ){
                    $("#alerta_email2").css('display', 'block');
                }
                // },
            });
        }
    });

    function deleta(valor){
        //alert(valor);
        count--;
        $(valor).remove();

    }

</script>

 

<script>

    $(document).ready(function(){
        $('.cidade').hide()
        // alert('ta ok')
        $('.estado').focusout(function(){
                let id_estado = $(this).val()
                // console.log(id_estado)
                $('.cidade').hide()
                $('.' + id_estado).show()
        //  alert('dsa');
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
