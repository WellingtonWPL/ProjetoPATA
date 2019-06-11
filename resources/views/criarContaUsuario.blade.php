@extends('template')

@section('conteudo')

<h1>Cadastro</h1>
<form >
    <div class="form-group">
        E-mail
        <input type="email" class="form-control" id="email" placeholder="email" required>
        
    </div>
    <div class="form-group">
        Senha
        <input type="password" class="form-control" id="senha1" placeholder="senha" required>
        <small id="emailHelp" class="form-text text-muted">mínimo 8 caracteres</small>
    </div>
    <div class="form-group">
        Repetir senha
        <input type="password" class="form-control" id="senha2" placeholder="senha" required>
        <small id="emailHelp" class="form-text text-muted">mínimo 8 caracteres</small>
    </div>
    <div class="form-group">
        Nome
        <input type="text" class="form-control" id="nome" placeholder="Nome" required>
        
    </div>
    <div class="form-group">
        Celular
        <input type="tel" name="fone" class="form-control" placeholder="(99) 9999-9999"required>  
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

@endsection