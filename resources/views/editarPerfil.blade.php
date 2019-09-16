@extends('template')

@section('conteudo')




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
<h1>Editar informações</h1>
<form method="POST" action="{{ url('/perfil/'.$usuario->cod_usuario.'/editar')}}">
    {{-- {{ csrf_field() }} --}}
    @csrf
    <div class="form-group">
        Nome
    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nome" value=" {{$usuario->nome}}" required autocomplete="name" autofocus
        >
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
        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $usuario->email}}" required autocomplete="email" id="email" placeholder="email" required>
        <div class="col-md-6">
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
     Estado
            <select class="estado form-control">
                <option value="estado" selected>Selecione
                </option>
                @foreach ($estados as $estado)
                <option value="{{ $estado->cod_estado }}">
                    {{$estado->sigla_estado}}</option>
                @endforeach
            </select>
            {{-- {{dd($cidades)}} --}}
            <br>
            Cidade
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

    {{-- </div> --}}
    <div class="form-group">
        Foto
        <input type="file" class="form-control-file">

    </div>

    @php
        //  dd($usuario->descricao);
    @endphp
    <div class="form-group">
        Descrição pessoal
        <textarea name="desc" class="form-control"  rows="5" value = " ">{{$usuario->descricao}}</textarea>

    </div>


    <button type="submit" class="btn btn-primary">Editar</button>

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
