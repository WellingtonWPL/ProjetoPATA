@extends('template')

@section('conteudo')
<div class="card" style="padding:5%; margin-left: 25%; margin-right:25%;">

    <form method="POST" action="{{ route('logar') }}" >
        {{ csrf_field() }}
        <h2>Entrar</h2>
        <div class="form-group">
            E-mail
            <input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="email" required autocomplete="email" autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            Senha
            <input name="senha" type="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="password" placeholder="senha" required autocomplete="current-password">
            <small id="emailHelp" class="form-text text-muted">mínimo 8 caracteres</small>
            {{-- @if ($errors->has('senha'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('senha') }}</strong>
                </span>
            @endif --}}
        </div>
        <small>
            <a href="{{ route('password.request') }}">Esqueci minha senha </a><br>
        </small> 

        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>

@endsection