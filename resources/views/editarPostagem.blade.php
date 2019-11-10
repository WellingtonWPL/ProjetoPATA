@extends('template')

@section("titulo", "Editar Postagem")

@section('conteudo')
<div class="card ">
	<div class="card-body">

		<form
			action="{{url('/postagem/'.$cod_postagem.'/editar')}}"
			method="POST">
			@csrf
			{{-- {{ csrf_field() }} --}}
			{{-- <form> --}}
			<div class="form-group">
				<b>Nome</b> <br>
				<small>Este campo se refere ao nome do
					animal, caso ele(a) não tenha um você
					pode colocar algo interessante (ex:
					Filhote de cachorro)</small>
				<input type="text" class="form-control" name="nome"
					id="nome" placeholder="Nome" required
                    maxlength="100"
                    value="{{$postagem->nome_animal}}"
                    >
				<div class="col-sm-12 alert alert-danger"
					id="div_erro_nome"
					style="display: none; margin-top: 20px;">
					Informe o nome do animal.
				</div>
			</div>


			{{-- FOTO --}}
			{{-- <div class="form-group">
				<b>Foto</b> <br>
				<div class="container">
					<div class="panel panel-info">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4 text-center">
									<div id="upload-demo">
									</div>
								</div>
								<div class="col-md-6" style="padding:5%;">
									<strong>Selecione uma
										imagem para
										enviar:</strong>
									<input type="file" id="image" required>
									<button type="button"
										class="btn btn-primary btn-block upload-image"
										style="margin-top:2%">Selecionar
										imagem</button>
									<br>
									<div>
										<div class="row"
											id="preview-crop-image">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- <div id="preview"></div> --}}

			{{-- SEXO --}}
			<div class="row">
				<div id="sexo" class="form-group col">
					<b>Sexo</b>
					<input style="display:none;" type="radio"
						name="sexo" value="0" checked><br>
                    <input type="radio" name="sexo" value="macho"
                    @if ($postagem->sexo == "macho")
                        checked
                    @endif
                    >
					Macho<br>
                    <input type="radio" name="sexo" value="femea"
                    @if ($postagem->sexo == "femea")
                        checked
                    @endif>
					Fêmea<br>
					<input type="radio" name="sexo"
                        value="indefinido"
                        @if ($postagem->sexo == "indefinido")
                        checked
                    @endif> Indefinido

                    {{-- alerta --}}
					<div class="col-sm-12 alert alert-danger"
						id="div_erro_sexo"
						style="display: none; margin-top: 20px;">
						Informe o sexo do animal.
                    </div>


				</div>

				<div id="porte" class="form-group col">
					<b>Porte</b>
					<input style="display:none;" type="radio"
						name="porte" value="0" checked><br>
                    <input type="radio" name="porte" value="1"
                    @if ($postagem->cod_porte == "1")
                        checked
                    @endif>
					Pequeno (até 30cm)<br>
                    <input type="radio" name="porte" value="2"
                    @if ($postagem->cod_porte == "2")
                        checked
                    @endif> Médio
					(De 31cm a
					80cm)<br>
                    <input type="radio" name="porte" value="3"
                    @if ($postagem->cod_porte == "3")
                        checked
                    @endif
                    > Grande
					(Mais de 80cm)
					<div class="col-sm-12 alert alert-danger"
						id="div_erro_porte"
						style="display: none; margin-top: 20px;">
						Informe o porte do animal.
					</div>
				</div>
				<div class="form-group col">
					<b>Espécie</b>
					<select name="especie" id="especie"
						class="form-control">
						<option value="0" selected>Selecione
						</option>
						@foreach ($especies as $especie)
                        <option value="{{$especie->cod_especie}}"
                            @if ($postagem->cod_especie == $especie->cod_especie)
                                selected
                            @endif>
							{{$especie->nome_especie}}
						</option>
						@endforeach
					</select>
					<div class="col-sm-12 alert alert-danger"
						id="div_erro_especie"
						style="display: none; margin-top: 20px;">
						Informe a espécie do animal.
					</div>
				</div>

			</div>

			{{-- DATA NASCIMENTO --}}
			<div class="form-group">
				<b>Data de Nascimento</b> <br>
				<input class="form-control" type="date"
					name="dataNascimento"
                    id="dataN" required
                    value="{{$postagem->nascimento}}"
                    >
				<div class="col-sm-12 alert alert-danger"
					id="div_erro_dataN"
					style="display: none; margin-top: 20px;">
					Informe a data de nascimento do animal.
				</div>
			</div>

			{{-- DESCRIÇÃO --}}
			<div class="form-group">
				<b>Descrição</b> <br>
				<textarea class="form-control" name="descricao"
					id="descricao" rows="5"
					maxlength="65535">{{$postagem->descricao}}</textarea>
				<div class="col-sm-12 alert alert-danger"
					id="div_erro_descricao"
					style="display: none; margin-top: 20px;">
					Diga algo sobre o animal.
				</div>
			</div>

			<div class="row">
				<div id="castrado" class="form-group col">
					<b>Castrado(a)</b>
					<input style="display:none;" type="radio"
						name="castrado" value="0" checked><br>
                    <input type="radio" name="castrado" value="sim"
                    @if ($postagem->castrado=="sim")
                        checked
                    @endif
                    >
					Sim<br>
                    <input type="radio" name="castrado" value="nao"
                    @if ($postagem->castrado=="nao")
                        checked
                    @endif>
					Não<br>
					<input type="radio" name="castrado"
                        value="indefinido"
                        @if ($postagem->castrado=="indefinido")
                            checked
                        @endif> Indefinido
					<div class="col-sm-12 alert alert-danger"
						id="div_erro_castrado"
						style="display: none; margin-top: 20px;">
						Informe se o animal é castrado.
					</div>
				</div>
				<div id="vacinado" class="form-group col">
					<b>Vacinação em dia</b>
					<input style="display:none;" type="radio"
						name="vacinacao" value="0" checked><br>
                    <input type="radio" name="vacinacao" value="sim"
                    @if ($postagem->vacinacao_em_dia=="sim")
                        checked
                    @endif>
					Sim<br>
                    <input type="radio" name="vacinacao" value="nao"
                    @if ($postagem->vacinacao_em_dia=="nao")
                        checked
                    @endif>
					Não<br>
					<input type="radio" name="vacinacao"
                        value="indefinido"
                        @if ($postagem->vacinacao_em_dia=="indefinido")
                            checked
                        @endif
                        > Indefinido
					<div class="col-sm-12 alert alert-danger"
						id="div_erro_vacinado"
						style="display: none; margin-top: 20px;">
						Informe se o animal é vacinado.
					</div>
				</div>
				<div id="vermifugado" class="form-group col">
					<b>Vermifugado(a)</b>
					<input style="display:none;" type="radio"
						name="vermifugado" value="0" checked><br>
					<input type="radio" name="vermifugado"
                        value="sim"
                        @if ($postagem->vermifugado=="sim")
                            checked
                        @endif
                        > Sim<br>
					<input type="radio" name="vermifugado"
                        value="nao"
                        @if ($postagem->vermifugado=="nao")
                            checked
                        @endif> Não<br>
					<input type="radio" name="vermifugado"
                        value="indefinido"
                        @if ($postagem->vermifugado=="indefinido")
                            checked
                        @endif> Indefinido
					<div class="col-sm-12 alert alert-danger"
						id="div_erro_vermifugado"
						style="display: none; margin-top: 20px;">
						Informe se o animal é vermifugado.
					</div>
				</div>
			</div>

			<div class="form-group">
				<b>Descrição de Saúde</b> <br>
				<small>Aqui você pode colocar qualquer
					cuidado especial que o animal
					precisa</small>
				<textarea class="form-control" name="descricaoSaude"
					id="descricaoSaude" rows="5"
					placeholder="Ex: O animal não possue uma das patas e necessita de cuidados."
					maxlength="65535">{{$postagem->descricao_saude}}</textarea>
				<div class="col-sm-12 alert alert-danger"
					id="div_erro_descricaoS"
					style="display: none; margin-top: 20px;">
					Informe algo sobre a saúde do animal.
				</div>
			</div>
			<br>
			<div class="form-group">
				<button
					class="btn btn-success salva">Postar</button>
			</div>
			<div id="resultado" name="resultado">

			</div>

			{{-- <button type="submit" class="btn btn-success salva">Postar</button> --}}
		</form>

	</div>
</div>


@endsection
