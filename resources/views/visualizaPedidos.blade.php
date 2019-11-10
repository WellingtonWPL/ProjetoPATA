@extends('template')
@section("titulo", "Pedidos de Adoção")
@section('conteudo')
@php
use App\Http\Controllers\SolicitacaoController;


$usuarioLogado = Auth::user();
if($cod_usuario!=$usuarioLogado->cod_usuario){
    // dd('ghujl');
    return redirect('perfil/'.$cod_usuario);
}


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
		<h2>Doações em andamento </h2>
        @php
            // dd($solicitacoes);
        @endphp
		@foreach ($solicitacoes as $solicitacao)
            @if ($solicitacao->cod_usuario_adotante != null && $solicitacao->avaliacao_adotante == NULL)

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
                @if($solicitacao->avaliacao_doador)
                <div class="col">
                    <a href="{{ url('postagem/'.$solicitacao->cod_postagem.'/avaliar_adotante') }}">
                        <button class="btn">Concluir</button>
                    </a>

                </div>
                @endif
            </div>

            @endif
        <br>
        @endforeach
	</div>
    </div>
    <br>

<div class="card">
        <div class='card-body'>
            <h2>Adoções em andamento</h2>

            @php
                // dd($suasSolicitacoes);
            @endphp
            @foreach ($suasSolicitacoes as $suasSol)
            @if ($suasSol->avaliacao_doador == NULL)

            <div class="row">
                <div class="col">

                    Adoção de {{$suasSol->nome_animal}} (postagem #{{ $suasSol->cod_postagem}}) <br>
                    Doador: <a href="  {{url('/perfil/'.$suasSol->cod_usuario)}}  ">{{ $suasSol->nome}}</a> <br>
                    Contato: {{ $suasSol->contato}} <br>
                </div>
                <div class="col-4">
                    <a href="{{url('/postagem/'.$suasSol->cod_postagem.'/avaliar_doador')}}">
                        <button class="btn ">Concluir</button>
                    </a>
                </div>

            </div>

            @endif

            @endforeach
        </div>
</div>

<br>
{{-- adoções Conclidas --}}
<div class="card">
        <div class='card-body'>
            <h2>Adoções Concluidas</h2>

            @php
                // dd($suasSolicitacoes);
            @endphp
            @foreach ($suasSolicitacoes as $suasSol)
            @if ($suasSol->avaliacao_doador != NULL)

            <div class="row">
                <div class="col">

                    Adoção de {{$suasSol->nome_animal}} (postagem #{{ $suasSol->cod_postagem}}) <br>
                    Doador: <a href="  {{url('/perfil/'.$suasSol->cod_usuario)}}  ">{{ $suasSol->nome}}</a> <br>
                    Contato: {{ $suasSol->contato}} <br>
                </div>
                <div class="col-4">
                    <div style="    text-align: center;">
                        @for ($i = 0; $i < $suasSol->avaliacao_doador; $i++)
                            <i class=" material-icons">pets</i>
                        @endfor
                    </div>
                    <br>

                    <a href="{{url('/postagem/'.$suasSol->cod_postagem.'/avaliar_doador')}}">
                        <button class="btn btn-block">Editar avaliação</button>
                    </a>
                </div>

            </div>

            @endif

            @endforeach
        </div>
</div>
<br>

<div class="card ">
  <div class="card-body">
      <h2>Doações Concluidas</h2>
      @foreach ($solicitacoes as $solicitacao)
            @if ($solicitacao->cod_usuario_adotante != null && $solicitacao->avaliacao_adotante != NULL)

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
            Adotado por: {{$adotante->nome}} <br>
            entrar em contato através de:
            {{$adotante->contato}}
                </div>
                @if($solicitacao->avaliacao_doador)
                <div class="col-4">
                    {{-- mostrar avaliação --}}
                    {{-- Avaliação: --}}
                    <div style="    text-align: center;">
                        @for ($i = 0; $i < $solicitacao->avaliacao_adotante; $i++)
                            <i class=" material-icons">pets</i>
                        @endfor
                    </div>
                    <br>
                    <a href="{{ url('postagem/'.$solicitacao->cod_postagem.'/avaliar_adotante') }}">
                        <button class="btn btn-block">Editar avaliação</button>
                    </a>

                </div>
                @endif
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
