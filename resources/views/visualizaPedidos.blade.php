@extends('template')

@section('conteudo')

<div class="card">
  <div class="card-body">
    
    
          <h2>Solicitações de adoção</h2>
          
       
          
          <div class="row">
            <div class="col">
              Usuário <a href="#">Pedro Brandalise</a> solicita a adoção 
              de <a href="#">Totó (postagem #341)</a>
            </div>
            <div class="col-3">
              <button class="btn btn-primary">Aceitar</button>
              <button class="btn btn-default">Recusar</button>
            </div>
            
          </div>
        
          
          <div class="row">
            <div class="col">
              Usuário <a href="#">João Pedro Rigoni</a> solicita a adoção 
              de <a href="#">Totó (postagem #341)</a>
            </div>
            <div class="col-3">
              <button class="btn btn-primary">Aceitar</button>
              <button class="btn btn-default">Recusar</button>
            </div>
            
          </div>
        
          <div class="row">
            <div class="col">
              Usuário <a href="#">Jefferson Kopp</a> solicita a adoção 
              de <a href="#">Totó (postagem #341)</a>
            </div>
            <div class="col-3">
              <button class="btn btn-primary">Aceitar</button>
              <button class="btn btn-default">Recusar</button>
            </div>
            
          </div>
        
          <div class="row">
            <div class="col">
              Usuário <a href="#">Emanuel Sidoski</a> solicita a adoção 
              de <a href="#">Totó (postagem #341)</a>
            </div>
            <div class="col-3">
              <button class="btn btn-primary">Aceitar</button>
              <button class="btn btn-default">Recusar</button>
            </div>
          
    </div>
  </div>
  
</div>

@endsection

@section('css')
<style>
  button{
    width: 100px;
  }
  .row{
    margin-top: 1%;
    padding-top: 1%;
    padding-bottom: 1%;
    border: #F5F5F5 solid 1px;
    
    border-radius: 5px;
  }
</style>
@endsection