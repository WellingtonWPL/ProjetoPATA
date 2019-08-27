@extends('template')

@section('conteudo')
<div class="card" style="padding:5%; margin-left: 25%; margin-right:25%;">

    <form method="POST" action="{{ route('login') }}" >
        @csrf
        <h2>Entrar</h2>
        <div class="form-group">
            E-mail
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="email" required autocomplete="email" autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            Senha
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="senha" required autocomplete="current-password">
            <small id="emailHelp" class="form-text text-muted">mínimo 8 caracteres</small>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <small>
            <a href="">Esqueci minha senha </a><br>
        </small> 

        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>

@endsection