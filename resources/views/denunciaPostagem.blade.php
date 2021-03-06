@extends('template')

@section('conteudo')
@php
    // dd($motivosDenuncia)
@endphp

<div class="card" style="padding:5%; margin-left: 25%; margin-right:25%;">
    <h3>
        Denunciar postagem: {{$postagem->nome_animal}}<br>
    </h3>
    Dono da postagem: {{$postagem->nome}}<br>
    <h4>Motivo:</h4>
    <form action="  {{url('/postagem/'.$postagem->cod_postagem.'/denunciar')}}" method="POST" class="form">
            @csrf
            <select class="custom-select my-1 mr-sm-2" onchange="checkOpcao()" id="options" name="motivo">
                <option selected>Selecione...</option>
                @foreach ($motivosDenuncia as $motivo)
                    <option value="{{$motivo->cod_motivo_denuncia}}">{{$motivo->descricao}}</option>
                @endforeach
            </select>
            <br>

            <input type="hidden" class="form-control" id="barraDescricao" name="descricao">
            <br>

            <button type="submit" class="btn btn-primary ">Denunciar</button>

            <button type="cancel" class="btn btn-danger ">Cancelar</button>
    </form>

</div>
<script>
    function checkOpcao(){
        var option = document.getElementById('options');
        var barraDescricao = document.getElementById('barraDescricao');
        if(option.value=='4'){
            barraDescricao.setAttribute('type', 'text')
        }else{
            barraDescricao.setAttribute('type', 'hidden')
        }

    }

</script>



@endsection
