@extends('template')

@section('conteudo')
@php
use App\Http\Controllers\SolicitacaoController;
@endphp

<div class="card">
	<div class="card-body">


		<h2>Solicitações de adoção</h2>
		@php
		// dd($solicitacoes);
		$entrou = False;
		@endphp

		@foreach ($solicitacoes as $solicitacao)
		@if ($solicitacao->cod_usuario_adotante==NULL)
		@php
		$entrou = True;
		@endphp

		<div class="row">
			<div class="col">
				Usuário <a
					href="{{url('perfil/'.$solicitacao->cod_usuario)}}">{{$solicitacao->nome}}</a>
				solicita a adoção
				de <a
					href="{{url('postagem/'.$solicitacao->cod_postagem)}}">{{$solicitacao->nome_animal}}(postagem
					#{{$solicitacao->cod_postagem}})</a>
			</div>
			<form
				action="{{url($solicitacao->cod_postagem.'/solicitacoes')}}"
				method="POST">
				@csrf
				<div class="col-3">
					<input type="hidden" id="solicitante"
						name="solicitante"
						value="{{$solicitacao->cod_usuario}}">
					<input type="hidden" id="postagem" name="postagem"
						value="{{$solicitacao->cod_postagem}}">
					<input type="hidden" id="donoPost" name="donoPost"
						value="{{$cod_usuario}}">
					@php
					// dd($cod_usuario);
					@endphp
					<input type="submit" name="Aceitar"
						value="Aceitar" class="btn btn-primary">
					<input type="submit" name="Recusar"
						value="Recusar" class="btn btn-default">

				</div>

		</div>
		</form>
		@endif

		@endforeach
		@if (($entrou)==False)
		<h4>Nenhuma solicitação por enquanto...</h4>
		@endif



	</div>
</div>
<br>
<div class="card">
	<div class='card-body'>
		<h2>Adoções em andamento</h2>

		@foreach ($solicitacoes as $solicitacao)
		@if ($solicitacao->cod_usuario_adotante != null)

		@php
		$adotante =
		SolicitacaoController::getUsuario($solicitacao->cod_usuario_adotante);
		@endphp

		<div class="row">
			<div class=" col">



		<a
			href=" {{url('postagem/'.$solicitacao->cod_postagem)}} ">

			<b>{{$solicitacao->nome_animal}}</b> postagem:
			{{$solicitacao->cod_postagem}} <br>
		</a>
		sendo adotado por: {{$adotante->nome}} <br>
		entrar em contato através de:
		{{$adotante->contato}}
	</div>

	<div class="col-4">

		<button class="btn ">Finalizar</button>

	</div>
	</div>

		@endif
		<br>
		@endforeach
	</div>
</div>

@endsection

@section('css')
<style>
	button {
		width: 100px;
	}

	.row {
		margin-top: 1%;
		padding-top: 1%;
		padding-bottom: 1%;
		border: #F5F5F5 solid 1px;

		border-radius: 5px;
	}
</style>
@endsection
