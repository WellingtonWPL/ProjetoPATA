@extends('template')
   
@section('conteudo')
{{-- {{$cod_postagem}} --}}
{{-- {{$codUsuario}} --}}
  <div class="card" >
    <div class="card-body">
      <h2 class="card-title">Postagem de animal</h2>
      {{-- <p class="card-text"></p> --}}
      <form >
        <div class="form-group">
            Nome <br>
            <small>Este campo se refere ao nome do animal, caso ele(a) não tenha um você pode colocar algo interessante (ex: Filhote de cachorro)</small>
            <input type="text" class="form-control" id="nome" placeholder="Nome" required>    
        </div>
        <div class="form-group">
            Foto <br>
            <small>Recomendamos uma foto com uma boa resolução tirada em um almbiente bem iluminado</small>
            <input type="file" class="form-control-file" onchange="handleFiles(this.files)">
        </div>
        <div id="preview"></div>
        <div class="form-group">
            Sexo <br>
            <input type="radio" name="sexo" value="macho" > Macho<br>
            <input type="radio" name="sexo" value="femea"> Fêmea<br>
            <input type="radio" name="sexo" value="indefinido"> Indefinido
        </div>

        <div class="form-group">
            Data de Nascimento  <br>       
            <input class="form-control" type="date" value="dataNascimento" id="">
        </div>
        <div>
            Descrição <br>
            <textarea class="form-control" name="descricao" id="" rows="5"></textarea>
        </div>
        <div class="row">

            <div class="form-group col">
                Castrado(a) <br>
                <input type="radio" name="castrado" value="Sim" > Sim<br>
                <input type="radio" name="castrado" value="Nao"> Não<br>
                <input type="radio" name="castrado" value="indefinido"> Indefinido
            </div>
            <div class="form-group col">
                Vacinação em dia <br>
                <input type="radio" name="vacinacao" value="Sim" > Sim<br>
                <input type="radio" name="vacinacao" value="Nao"> Não<br>
                <input type="radio" name="vacinacao" value="indefinido"> Indefinido
            </div>
            <div class="form-group col">
                Vermifugado(a) <br>
                <input type="radio" name="vermifugado" value="Sim" > Sim<br>
                <input type="radio" name="vermifugado" value="Nao"> Não<br>
                <input type="radio" name="vermifugado" value="indefinido"> Indefinido
            </div>    
        </div>
        <div>
            Descrição <br>
            <small>Aqui você pode colocar qualquer cuidado especial que o animal precisa</small>
            <textarea class="form-control" name="descricaoSaude" id="" rows="5"></textarea>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Postar</button>

    </form>
    
      
    </div>
  </div>




  <script>
    const inputElement = document.getElementById("input");
    inputElement.addEventListener("change", handleFiles, false);


    function handleFiles(files) {
        for (let i = 0; i < files.length; i++) {
            const file = files[0];
            
            if (!file.type.startsWith('image/')){ continue }
            
            const img = document.createElement("img");
            img.classList.add("img-thumbnail");
            img.file = file;
            preview.appendChild(img); // Assuming that "preview" is the div output where the content will be displayed.
            // preview=img;
            
            const reader = new FileReader();
            reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
            reader.readAsDataURL(file);
        }
    }
  
  </script>

@endsection

@section('css')
<style>
img{
    /* border: black 1px solid; */
    max-width: 250px;
    max-height: 250px;  
} */
</style>
    
@endsection

