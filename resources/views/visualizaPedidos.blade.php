@extends('template')

@section('conteudo')

<div class="card">
  <div class="card-body">


          <h2>Solicitações de adoção</h2>
          @php
            //   dd($solicitacoes);
          @endphp

          @foreach ($solicitacoes as $solicitacao)


          <div class="row">
                <div class="col">
                  Usuário <a href="{{url('perfil/'.$solicitacao->cod_usuario)}}">{{$solicitacao->nome}}</a> solicita a adoção
                  de <a href="{{url('postagem/'.$solicitacao->cod_postagem)}}">{{$solicitacao->nome_animal}}(postagem #{{$solicitacao->cod_postagem}})</a>
                </div>
                <div class="col-3">
                  <button class="btn btn-primary">Aceitar</button>
                  <button class="btn btn-default">Recusar</button>
                </div>

              </div>

          @endforeach



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
