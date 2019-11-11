<?php

namespace App\Http\Controllers;

use App\PostagemDoAnimal;
use App\Solicitacao;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use vendor\autoload;


class SolicitacaoController extends Controller
{
    public function solicitar($cod_postagem){
    
        //  dd($_POST);


        // dd($cod_postagem);
        $usuario =(Auth::user());
        // dd($usuario->cod_usuario);
        $solicitacao = new Solicitacao;

        $solicitacao->cod_usuario_solicitante = $usuario->cod_usuario;
        $solicitacao->cod_postagem = $cod_postagem;

        $solicitacao->save();
        $assunto = 'Solicitação de Adoção';
        $mensagem = '<p>Teste</p>';
        $this->enviaEmail($usuario->email, $assunto, $mensagem);

        return view('sucesso', ['msg'=> 'Solicitação realizada com sucesso :)']);
    }

    public function mostrar($cod_postagem){
        $postagem = \DB::table('Postagem_do_animal')
        ->where('cod_postagem', $cod_postagem)
        ->join('Porte', 'Postagem_do_animal.cod_porte', '=', 'Porte.cod_porte')
        ->join('Usuario', 'Postagem_do_animal.cod_usuario_postagem', '=', 'Usuario.cod_usuario')
        ->first();
        $foto = \DB::table('Foto_postagem')->where('cod_postagem', $cod_postagem)->first();

        return view('solicitacaoPostagem', ['cod_postagem'=> $cod_postagem,
        'postagem'=> $postagem , 'foto'=>$foto]
        );
    }

    public function mostrarPedidos($cod_usuario){
        #solicitações para o usuario logado
        $solicitacoes = \DB::table('Solicitacao')
        ->join('Postagem_do_animal', 'Postagem_do_animal.cod_postagem', '=', 'Solicitacao.cod_postagem')
        ->join('Usuario', 'Solicitacao.cod_usuario_solicitante', '=', 'Usuario.cod_usuario')
        ->where('Postagem_do_animal.cod_usuario_postagem', $cod_usuario)
        ->where('recusada', 'nao')
        ->get()
        ;

        // dd($solicitacoes);

        //solicitações do usuario logado para outros usuarios
        $usuarioLogado= Auth::user();

        $suasSolicitacoes = \DB::table('Postagem_do_animal')
        ->join('Usuario', 'Usuario.cod_usuario', '=', 'Postagem_do_animal.cod_usuario_postagem')
        ->where('cod_usuario_adotante', $usuarioLogado->cod_usuario)
        ->get();
        // dd($suasSolicitacoes);

        // $doacoes= \DB::table('Postagem_do_animal')
        // ->join('Usuario', 'Usuario.cod_usuario', '=', 'Postagem_do_animal.cod_usuario_postagem')
        // ->where('cod_usuario_postagem', $usuarioLogado->cod_usuario)
        // ->get();

        return view('visualizaPedidos',compact('cod_usuario', 'solicitacoes', 'suasSolicitacoes'));


    }

    public function aceitarSolicitacao(Request $r){

        // dd($r->Aceitar);
        // dd($r->Recusar);
        // dd($r->postagem);
        // dd($r->donoPost);
        $postagem =PostagemDoAnimal::where('cod_postagem', $r->postagem )->first();
        // dd($postageSm);
        if (isset($r->Aceitar)) {
            $postagem->cod_usuario_adotante = $r->solicitante;
            $postagem->save();

        }else{
           $solicitacao = \DB::table('Solicitacao')
           ->where('cod_usuario_solicitante', $r->solicitante)
            ->where('cod_postagem', $r->postagem)
            ->update(['recusada' => 'sim']);
            // dd($solicitacao);
            // $solicitacao->recusada ='sim';
            // $solicitacao->save();
        }

        // troca de contatos


        return redirect($r->donoPost.'/solicitacoes');
    }

    public static function getUsuario($cod){
        return Usuario::where('cod_usuario', $cod)->first();

    }

    public function avaliarDoador($cod_postagem, Request $r){
        // dd($r->nota);
        $usuario= Auth::user();
        \DB::table('Postagem_do_animal')
        ->where('cod_postagem', $cod_postagem)
        ->update(['avaliacao_doador'=> $r->nota]);
        return redirect($usuario->cod_usuario.'/solicitacoes');
    }

    public function avaliarAdotante($cod_postagem, Request $r){
        // dd($r->nota);
        $usuario= Auth::user();
        \DB::table('Postagem_do_animal')
        ->where('cod_postagem', $cod_postagem)
        ->update(['avaliacao_adotante'=> $r->nota]);
        return redirect($usuario->cod_usuario.'/solicitacoes');
    }

    public function enviaEmail($email_usuario, $assunto, $mensagem){
        //require 'vendor/autoload.php';
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail = new PHPMailer();
            $mail->IsSMTP();  // telling the class to use SMTP
            $mail->SMTPDebug = false;
            $mail->Mailer = "smtp";
            $mail->SMTPSecure = 'ssl';
            $mail->Host = gethostbyname('smtp.gmail.com');
            $mail->Port = 465;                                    // Send using SMTP
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'projeto.pata2019@gmail.com';                     // SMTP username
            $mail->Password   = 'laravel58';       
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );                        // SMTP password
            //$Mail->Priority = 1;

        
            //Recipients
            $mail->setFrom('projeto.pata2019@gmail.com', 'Projeto PATA');
            $mail->addAddress($email_usuario);     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $assunto;
            $mail->Body    = $mensagem;
                   
            $mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


}

