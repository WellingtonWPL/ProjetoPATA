<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use App\PostagemDoAnimal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use AuthenticatesUsers {
//     logout as performLogout;
// }

class PerfilController extends Controller
{
    public static function getAvaliacao($cod){
        // // // dd($cod);
        $avaliacoes = \DB::table('Postagem_do_animal')
        ->where('cod_usuario_postagem', $cod)
        ->where('avaliacao', '!=', NULL)
        ->get();

        if($avaliacoes==NULL){
            return $avaliacoes;
        }else{

            $cont=0;
            $aux=0;
            // if(!is_array($avaliacoes)){
            //     dd()
            //     return $avaliacoes;
            // }
            foreach ($avaliacoes as $avaliacao) {
                $aux+=$avaliacao->avaliacao;
                $cont++;
            }
            // dd($aux);
            if($cont==0){   return 0;   }
            return ($aux/$cont);
        }
    }

    public function mostrar($cod_usuario){
        $usuario = User::where('cod_usuario', $cod_usuario)->get();

        if($usuario[0]->oculto=='sim'){
            return view('sucesso', ['msg'=>'Usuario excluido']);
        }
        return view('perfilUsuario', ['cod_usuario'=>$cod_usuario, 'usuario'=>$usuario]);
    }

    public static function getPostagens($cod_usuario){
        // $postagens = PostagemDoAnimal::where('cod_usuario_postagem', $cod_usuario)->get();
        $postagens=\DB::table('Postagem_do_animal')
            ->join('Porte', 'Postagem_do_animal.cod_porte', '=', 'Porte.cod_porte')->where('cod_usuario_postagem', $cod_usuario)->get();
        return $postagens;


    }

    public static function getSolicitacoes($cod_usuario){
        $solicitacoes = \DB::table('Solicitacao')
        ->join('Postagem_do_animal', 'Postagem_do_animal.cod_postagem', '=', 'Solicitacao.cod_postagem')
        ->join('Usuario', 'Usuario.cod_usuario', '=', 'cod_usuario_postagem')
        ->where('Usuario.cod_usuario', $cod_usuario)->get();
        return count($solicitacoes);
    }

    public static function getCidade($cod_cidade){

        $cidade = Cidade::where('cod_cidade', $cod_cidade)->get();

        // dd($cidade[0]->cod_estado);
        $estado= Estado::where('cod_estado', $cidade[0]->cod_estado)->get();
        // $estado= Estado::where('cod_estado', 2)->get();


        // dd($estado[0]->sigla_estado );
        return[$cidade[0]->nome_cidade, $estado[0]->sigla_estado ];


    }

    public function editar($cod_usuario){
        $usuario= User::where('cod_usuario',$cod_usuario)->first();
        // dd($usuario);
        $cidades = Cidade::all();
        $estados = Estado::all();
        return view('editarPerfil', compact('usuario', 'estados', 'cidades'));

    }
    public function inserirEdicao($cod_usuario, Request $r){
        if($r->cidade=="Selecione"){
            return redirect('perfil/'.$cod_usuario.'/editar');


        }

        $usuario= User::where('cod_usuario',$cod_usuario)->first();
        //  dd($usuario);
        $usuario->nome = $r->nome;
        $usuario->email = $r->email;
        $usuario->cod_cidade = $r->cidade;
        $usuario->descricao= $r->desc;
        $usuario->save();
        return redirect('perfil/'.$cod_usuario);
    }

    public function excluirPerfil($cod_usuario, Request $r){
        $usuario = Auth::user();
        User::where('cod_usuario', $cod_usuario)
              ->update(['oculto'=> 'sim']);

        PostagemDoAnimal::where('cod_usuario_postagem', $cod_usuario)
                ->update(['listagem_postagem' => 'nao']);

                // return redirect('logout');
                // return route('logout');
                 __('Logout');
                // $this->performLogout($r);
                // dd('show');
                Auth::logout();
                return redirect()->route('login');

    }


}
