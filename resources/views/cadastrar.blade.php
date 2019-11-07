@extends('template')
@section("titulo", "Cadastro de Novo Usuário")
@section('conteudo')

@php

@endphp



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script>
    $(document).ready(function(){
        $('#password-confirm, #senha').keyup(function () {
            // alert('ok')
            if ($('#senha').val() == $('#password-confirm').val()) {
                $('#message').html(' As senhas conferem! &#10004').css('color', 'green');
            } else
                $('#message').html('As senhas NÃO conferem! &#10006 ').css('color', 'red');
        });

    })
</script>
<script type="text/javascript">
    var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
    };

    $('#fone').mask(SPMaskBehavior, spOptions);

</script>
<div class="card" style="padding:5%;">
<h1>Cadastro</h1>
<form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    <div class="row form-group">
        <div class="form-group col-md-6">
                <b> Nome</b>
            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nome" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome"
            maxlength="50"
            >
            <div class="col-md-6">
                @if ($errors->has('nome'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group col-md-6">
                <b> Sobrenome</b>
            <input type="text" class="form-control{{ $errors->has('sobrenome') ? ' is-invalid' : '' }}" name="sobrenome" value="{{ old('sobrenome') }}" required autocomplete="sobrenome" autofocus placeholder="Sobrenome"
            maxlength="50"
            >

            <div class="col-md-6">
                @if ($errors->has('sobrenome'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('sobrenome') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
                <b>E-mail</b>
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" id="email" placeholder="email" required
            maxlength="100"
            >
            <div class="col-md-6">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group col-md-6">
                <b>Celular</b>
            <input id="fone" type="text" name="fone" class="form-control" placeholder="(99) 9999-9999"required>
        </div>
    </div>
    <div class="form-group">
            <b>Contato
            <input id="contato" type="text" name="contato" class="form-control" required placeholder="Ex: WhatsApp - (99) 99999-9999 ou E-mail - pata@pata.com"
            maxlength="50"
            >
            <small id="contatoHelp" class="form-text text-muted">Aqui você deve inserir sua forma de contato para o doador poder conversar com você. </small>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
                <b> Senha</b>
            <input id="senha" type="password" class="form-control{{ $errors->has('senha') ? ' is-invalid' : '' }}" name="senha" required autocomplete="new-password" placeholder="Senha"
            maxlength="50"
            >
            <small id="emailHelp" class="form-text text-muted">mínimo 8 caracteres</small>
            @if ($errors->has('senha'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('senha') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group col-md-6">
                <b>Repetir senha</b>
            <input id="password-confirm" type="password" placeholder="senha" class="form-control" name="password_confirmation" required autocomplete="new-password"
            maxlength="50"
            >
            <small id="emailHelp" class="form-text text-muted">mínimo 8 caracteres</small>
            <span id='message'></span>
        </div>
    </div>


    {{-- <div class="row"> --}}
    <div class="form-group row">
        <div class="form-group col-md-6">
            <b>Estado</b>
            <select class="estado form-control">
                <option value="estado" selected>Selecione
                </option>
                @foreach ($estados as $estado)
                <option value="{{ $estado->cod_estado }}">
                        {{$estado->nome_estado}} - {{$estado->sigla_estado}}</option>
                @endforeach
            </select>
            {{-- {{dd($cidades)}} --}}
        </div>
        <div class="form-group col-md-6">
            <b>Cidade</b>
            <select name="cidade" class="form-control">

                <option selected>Selecione</option>
                @foreach ($cidades as $cidade)
                <option
                    class="cidade {{$cidade->cod_estado}}"
                    value="{{$cidade->cod_cidade}}" >
                    {{$cidade->nome_cidade}}</option>
                @endforeach
                {{-- <option>Ponta Grossa</option> --}}
            </select>
        </div>
    </div>
    {{-- </div> --}}
    <div class="form-group">
            <b>Foto</b>
        <input type="file" class="form-control-file">

    </div>
    <div class="form-group">
            <b>Descrição pessoal</b>
        <textarea name="desc" class="form-control" placeholder="Você poderá editar este campo depois! ;)" rows="5"
        maxlength="65535"
        ></textarea>

    </div>


    <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>
</div>

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
