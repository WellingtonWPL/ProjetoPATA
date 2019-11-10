@extends('template')


@section('conteudo')
    <div class="card text-center">
      {{-- <img class="card-img-top" src="holder.js/100px180/" alt=""> --}}
      <div class="card-body">
      <h4 class="card-title">Postagem Bloqueada</h4>
        <p class="card-text">a postagem # {{$cod_postagem}} foi bloqueada por um moderador para reavaliação entrar em contato com projetopata2019@gmail.com informando o número da postagem.</p>
      </div>
    </div>


@endsection
