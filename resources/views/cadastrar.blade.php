@extends('template')

@section('conteudo')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script>
    $(document).ready(function(){
        $('#senha2, #senha').keyup(function () {
            // alert('ok')
            if ($('#senha').val() == $('#senha2').val()) {
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
    @csrf
    <div class="form-group">
        Nome
        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome">
        <div class="col-md-6">
            @if ($errors->has('nome'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nome') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        E-mail
        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" id="email" placeholder="email" required>
        <div class="col-md-6">
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        Senha
        <input id="senha" type="password" class="form-control{{ $errors->has('senha') ? ' is-invalid' : '' }}" name="senha" required autocomplete="new-password" placeholder="Senha">
        <small id="emailHelp" class="form-text text-muted">mínimo 8 caracteres</small>
        @if ($errors->has('senha'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('senha') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        Repetir senha
        <input type="password" class="form-control" id="senha2" placeholder="senha" required autocomplete="new-password">
        <small id="emailHelp" class="form-text text-muted">mínimo 8 caracteres</small>
        <span id='message'></span>
    </div> 
    
    <div class="form-group">
        Celular
        <input id="fone" type="text" name="fone" class="form-control" placeholder="(99) 9999-9999"required>  
    </div>
    <div class="form-group">
        Foto
        <input type="file" class="form-control-file">

    </div>
    <div class="form-group">
        Descrição pessoal
        <textarea name="desc" class="form-control" placeholder="Você poderá editar este campo depois! ;)" rows="5" ></textarea>    

    </div>
    

    <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>
</div>



@endsection