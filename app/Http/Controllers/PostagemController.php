<?php

namespace App\Http\Controllers;

use App\Denuncia;
use App\User;
use App\Especie;
use App\PostagemDoAnimal;
use App\FotoPostagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

class PostagemController extends Controller
{
	public function mostrar($cod_postagem){
		// dd($cod_postagem);
		/*denunciasPI= Denuncia
		::where('finalizada', '=', 'sim')->where('listagem_postagem', 'nao')
		->join('Postagem_do_animal', 'cod_postagem_denunciada' , '=', 'Postagem_do_animal.cod_postagem')
		->join('Usuario', 'Postagem_do_animal.cod_usuario_postagem', '=', 'Usuario.cod_usuario')
		->join('Motivos_Denuncia', 'Denuncia.cod_motivo_denuncia', '=', 'Motivos_Denuncia.cod_motivo_denuncia')
		->get(); */

		$denuncia= Denuncia
		::join('Postagem_do_animal', 'cod_postagem_denunciada' , '=', 'Postagem_do_animal.cod_postagem')
		->where('cod_postagem_denunciada', '=', $cod_postagem)
		->where('finalizada', '=', 'sim')
		->where('listagem_postagem', 'nao')->first();


		if($denuncia!=null && !AdminController::ehAdmin()){
			return view('postagemDenunciada', compact('cod_postagem'));
		}
		$postagem = \DB::table('Postagem_do_animal')
		->where('cod_postagem', $cod_postagem)
		->join('Porte', 'Postagem_do_animal.cod_porte', '=', 'Porte.cod_porte')
		->join('Usuario', 'Postagem_do_animal.cod_usuario_postagem', '=', 'Usuario.cod_usuario')
		->first();
		$foto = \DB::table('Foto_postagem')->where('cod_postagem', $cod_postagem)->first();

		$usuario = User::where('cod_usuario', $postagem->cod_usuario)->get();
		$especies = Especie::orderBy('cod_especie')->get();

		if($usuario[0]->oculto=='sim'){
			return view('sucesso', ['msg'=>'Perfil do dono da postagem excluido']);
		}
		//  dd($postagem);
		return view('postagemAnimal', ['postagem'=>$postagem, 'foto'=> $foto]);
	}

	public function inserirPostagem(Request $data){

		$usuario = Auth::user();
		//$usuario = User::where('cod_usuario', $cod_usuario)->get();
		//$data = $data->all();
		//dd($data);
		$cod_usuario = $usuario->cod_usuario;
		$postagem = new PostagemDoAnimal();

		$postagem->nome_animal= $data['nome'];
		$postagem->sexo= $data->sexo;
		$postagem->nascimento= $data->dataN;
		$postagem->descricao= $data->descricao;
		$postagem->castrado= $data->castrado;
		$postagem->vacinacao_em_dia= $data->vacinado;
		$postagem->vermifugado= $data->vermifugado;
		$postagem->descricao_saude= $data->descricaoSaude;
		$postagem->cod_usuario_postagem= $cod_usuario;
		$postagem->cod_porte= $data->porte;
		$postagem->cod_especie= $data->especie;
		$postagem->listagem_postagem= 'sim';

		$postagem->save();

		$cod_postagem = $postagem->cod_postagem;

		$foto = new FotoPostagem();

		$image = $data->fotos[0];
		list($type, $image) = explode(';', $image);
		list($teste, $image)      = explode(',', $image);
		$image = base64_decode($image);
		$image_name= time().'.jpg';
		$path = public_path('upload/'.$image_name);
		$link = 'upload/'.$image_name;

		file_put_contents($path, $image);

		$foto->link_foto_postagem= $link;
		$foto->cod_postagem= $cod_postagem;

		$foto->save();

		//dd($postagem);



		// dd($data);


		//$input = $request->all();

		return response()->json(['success'=>'deu boa.']);
	}

	public function novaPostagem(){
		///dd('TESTE');
		$especies = Especie::orderBy('nome_especie')->get();
		return view('postaAnimal', compact('especies'));

	}

	public function mostrarEdicao($cod_postagem){
		$postagem = PostagemDoAnimal::where('cod_postagem', $cod_postagem)->first();
		if(Auth::check()){
			// dd("epa");
			$user = Auth::user();
			if($user->cod_usuario != $postagem->cod_usuario_postagem){
				// dd('epa');
				$msg= "Apenas o dono dessa postagem pode alterá-la";
				return view('sucesso', compact('msg') );
			}
		}

		$especies = Especie::orderBy('nome_especie')->get();
		return view('editarPostagem', compact('postagem', 'cod_postagem', 'especies'));

	}

	public function editar(Request $r, $cod_postagem){
		$postagem = PostagemDoAnimal::where('cod_postagem', $cod_postagem)->first();
		if(Auth::check()){
			//dd("epa");
			$user = Auth::user();
			if($user->cod_usuario != $postagem->cod_usuario_postagem){
				// dd('epa');
				$msg= "Apenas o dono dessa postagem pode alterá-la";
				return view('sucesso', compact('msg') );
			}
		}


		// dd($_POST);
		// dd($postagem);
		$postagem->nome_animal= $r->nome;
		$postagem->sexo= $r->sexo;
		$postagem->nascimento= $r->dataNascimento;
		$postagem->descricao= $r->descricao;
		$postagem->castrado= $r->castrado;
		$postagem->vacinacao_em_dia= $r->vacinado;
		$postagem->vermifugado= $r->vermifugado;
		$postagem->descricao_saude= $r->descricaoSaude;

		$postagem->cod_porte= $r->porte;
		$postagem->cod_especie= $r->especie;
		$postagem->listagem_postagem= 'sim';

		$postagem->save();
		return redirect('postagem/'.$cod_postagem);

	}
}
