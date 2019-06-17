@extends('template')

@section('conteudo')

<div class="card" style="padding:5%; margin-left: 25%; margin-right:25%;">
    <h3>
        Denunciar postagem: Totó <br>
    </h3>
    Dono da postagem: José da Silva
    <h4>Motivo:</h4>
    <form action="" class="form">
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option selected>Escolher...</option>
                    <option value="1">Imagem inapropriada</option>
                    <option value="2">Venda de animais</option>
                    <option value="3">Outro</option>
            </select>

            <button type="submit" class="btn btn-primary ">Denunciar</button>
            <button type="" class="btn btn-danger ">Cancelar</button>
            



    </form>

</div>


    
@endsection