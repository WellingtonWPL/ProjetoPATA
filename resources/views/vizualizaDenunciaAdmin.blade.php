@extends('template')

@section('conteudo')

<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Denucia Pendente
          </button>
        </h5>
      </div>
  
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          
            <table>

                    <tr>                
                    <td>Código Postagem: <a href="#">640</a> &nbsp;</td>
                    <td>Dono da Postagem: José Maria &nbsp;</td>
                    <td>Motivo: Venda de animais &nbsp;</td>
                    <td><button class="btn  btn-danger">Excluir</button></td>
                    <td><button class="btn  btn-success">Restaurar</button></td>
                    </tr>
                
                    <tr>
                    <td>Código Postagem: <a href="#">1005</a> &nbsp;</td>
                    <td>Dono da Postagem: Arnaldo Moura &nbsp;</td>
                    <td>Motivo: Postagem de aninal silvestre &nbsp; </td>
                    <td><button class="btn  btn-danger">Excluir</button></td>
                    <td><button class="btn  btn-success">Restaurar</button></td>
                    </tr>

                    <tr>
                    <td>Código Postagem: <a href="#">203</a> &nbsp;</td>
                    <td>Dono da Postagem: Adalberto Pereira &nbsp;</td>
                    <td>Motivo: Conteúdo improprio &nbsp;</td>
                    <td><button class="btn  btn-danger">Excluir</button></td>
                    <td><button class="btn  btn-success">Restaurar</button></td>
                    </tr>
                    
            </table>

        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Postagens Impróprias
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
                <table>

                        <tr>                
                        <td>Código Postagem: <a href="#">644</a> &nbsp;</td>
                        <td>Dono da Postagem: José Arnaldo &nbsp;</td>
                        <td>Motivo: Venda de animais &nbsp;</td>
                        
                        </tr>
                    
                        <tr>
                        <td>Código Postagem: <a href="#">100</a> &nbsp;</td>
                        <td>Dono da Postagem: Sabrina Moura &nbsp;</td>
                        <td>Motivo: Postagem de aninal silvestre &nbsp; </td>
                        
                        </tr>
                </table>
        </div>
      </div>
    </div>
  </div>
    
@endsection