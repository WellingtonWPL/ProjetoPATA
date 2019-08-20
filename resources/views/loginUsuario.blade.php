@extends('template')

@section('conteudo')
<div class="card" style="padding:5%; margin-left: 25%; margin-right:25%;">

    <form >
        <h2>Entrar</h2>
        <div class="form-group">
            E-mail
            <input type="email" class="form-control" id="email" placeholder="email" required>
            
        </div>
        <div class="form-group">
            Senha
            <input type="password" class="form-control" id="senha1" placeholder="senha" required>
            <small id="emailHelp" class="form-text text-muted">mínimo 8 caracteres</small>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>

@endsection