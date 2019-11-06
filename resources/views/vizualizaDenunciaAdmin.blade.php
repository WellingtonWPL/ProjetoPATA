@php
    // dd($denunciasDP);
@endphp
@extends('template')
@section("titulo", "Denúncias de Postagens")
@section('conteudo')

@php
// dd($foto);
$i=0;$j=0;
@endphp

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse"
          data-target="#collapseOne" aria-expanded="true"
          aria-controls="collapseOne">
          Denucia Pendente
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show"
      aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">

        @foreach ($denunciasDP as $denuncia)
        @if ($denuncia->finalizada=="nao")

        <div class="row">
          <div class="col">

            {{-- Dono da Postagem: {{$denuncia->nome}}&nbsp;
            --}}
            <a
              href="postagem/{{$denuncia->cod_postagem_denunciada}}">
            <b>{{$denuncia->nome_animal}}</b>

            # {{$denuncia->cod_postagem_denunciada}}</a>
            &nbsp;
          </div>
          <div class="col">

            @if ($denuncia->descricao_denuncia == 'Outro')
                <b>Motivo:</b> {{$denuncia->descricao_denuncia_outro}}
            @else
                <b>Motivo:</b> {{$denuncia->descricao_denuncia}}
            @endif
            &nbsp;
          </div>
          <div class="col">

            <a
              href="{{ url('admin/excluir/'.$denuncia->cod_postagem_denunciada)}} ">
              <button
                class="btn  btn-danger">Aceitar</button>
            </a>

            <a
              href="{{ url('admin/restaurar/'.$denuncia->cod_postagem_denunciada)}} ">
              <button
                class="btn  btn-success">Negar</button>
            </a>
        </div>

        </div>


        <div class="row">

          <div class="col">

            <div>
              @if ($fotoDP[$i]==NULL)
              <img id="foto-postagem"
                src="{{url('img/animal_sem_foto.png')}}"
                class="img-fluid rounded">
              @else
              <img id="foto-postagem"
                src="{{url($fotoDP[$i]->link_foto_postagem)}}"
                class="img-fluid rounded">
                @php
                    $i++;
                @endphp


              @endif
            </div>
          </div>
          <div class="col">
            @php
                // dd($denuncia);
            @endphp
            <div>
            <b>Descrição:</b>
              {{$denuncia->descricao}}
            </div>
            <div>
                @if($denuncia->sexo=='femea')
                    <b>Sexo:</b> Femêa
                @else
                    Sexo: Maxo
                @endif
            </div>
            <div>
                <b>Descrição Saúde:</b>
                {{$denuncia->descricao_saude}}
            </div>

          </div>
        </div>
        <br>
        <div style="text-align:center;">
            _
        </div>
        <br>



        @endif
        @endforeach



      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed"
          data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="false" aria-controls="collapseTwo">
          Postagens Impróprias
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse"
      aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <table>
            @php
                // dd($denunciasPI);
            @endphp
          @foreach ($denunciasPI as $denuncia)
          @if ($denuncia->finalizada=="sim" &&
          $denuncia->listagem_postagem=='nao')
          <div class="row">

              <div class="col">
                  <a
                  href="postagem/{{$denuncia->cod_postagem_denunciada}}">
                <b>{{$denuncia->nome_animal}}</b>

                # {{$denuncia->cod_postagem_denunciada}}</a>
                &nbsp;
            </div >
                <div class="col">Dono da Postagem:
                    {{$denuncia->nome}}&nbsp;
                </div >

                <div class="col">
                    @if ($denuncia->descricao_denuncia == 'Outro')
                        <b>Motivo:</b> {{$denuncia->descricao_denuncia_outro}}
                    @else
                        <b>Motivo:</b> {{$denuncia->descricao_denuncia}}
                    @endif
                &nbsp;
                </div >

                        <div class="col">
                            <a
                            href="{{ url('admin/restaurar/'.$denuncia->cod_postagem_denunciada)}} ">
                            <button
                            class="btn  btn-success">Restaurar</button>
                        </a>
                    </div >


            </div>

        <div class="row">

                <div class="col">

                  <div>
                    @if ($fotoPI[$j]==NULL)
                    <img id="foto-postagem"
                      src="{{url('img/animal_sem_foto.png')}}"
                      class="img-fluid rounded">
                    @else
                    <img id="foto-postagem"
                      src="{{url($fotoPI[$i]->link_foto_postagem)}}"
                      class="img-fluid rounded">
                    @endif
                  </div>
                </div>
                <div class="col">
                  @php
                      // dd($denuncia);
                  @endphp
                  <div>
                  <b>Descrição:</b>
                    {{$denuncia->descricao}}
                  </div>
                  <div>
                      @if($denuncia->sexo=='femea')
                          <b>Sexo:</b> Femêa
                      @else
                          Sexo: Maxo
                      @endif
                  </div>
                  <div>
                      <b>Descrição Saúde:</b>
                      {{$denuncia->descricao_saude}}
                  </div>

                </div>
              </div>
              <br>
              <div style="text-align:center;">
                  _
              </div>
              <br>
              @php
              $j++;
              @endphp


          @endif
          @endforeach

        </table>
      </div>
    </div>
  </div>
</div>

@endsection
