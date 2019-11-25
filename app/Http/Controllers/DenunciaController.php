<?php

namespace App\Http\Controllers;

use App\Denuncia;
use App\MotivosDenuncia;
use App\PostagemDoAnimal;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use vendor\autoload;

class DenunciaController extends Controller
{
    public function mostrar($cod_postagem){
        $postagem = PostagemDoAnimal::where('cod_postagem', $cod_postagem)
        ->join('Usuario', 'Usuario.cod_usuario', 'Postagem_do_animal.cod_usuario_postagem')
        ->first();
        $motivosDenuncia = MotivosDenuncia::all();

        return view('denunciaPostagem',compact('postagem', 'motivosDenuncia') );

    }

    public function fazerDenuncia(Request $r, $cod_postagem){
        if ($r->motivo == "Selecione...") {
            return redirect('postagem/'.$cod_postagem.'/denunciar');
        }else{

            $usuario= Auth::user();

            $date = date('Y-m-d');
            // dd($date);

            $denuncia = new Denuncia();
            $denuncia->data_denuncia=$date;
            $denuncia->cod_usuario_denunciante=$usuario->cod_usuario;
            $denuncia->cod_postagem_denunciada=$cod_postagem;
            $denuncia->cod_motivo_denuncia=$r->motivo;
            $postagem = PostagemDoAnimal::where('cod_postagem', $cod_postagem)->first();
            $postagem->listagem_postagem= 'nao';
            

            if($r->descricao!=NULL){
                $denuncia->descricao_denuncia_outro=$r->descricao;
            }
            
            $usuario = Usuario::where('cod_usuario', $postagem->cod_usuario_postagem)->first();
            
            $assunto = 'Denúncia de Postagem';

            $mensagem = '<div style="text-align:center;" >
            <div class="container">
                <div class="card"  style="position: center; margin:auto;">
                    <div class="card-body"  >
                        <h1 class="masthead-heading mb-0">Projeto PATA</h1>
                        <div id="texto-card">
                            <p><b>Olá,</b> parece que uma de suas postagens foi denunciada.</p>
                            <p>A postagem #' . $postagem->cod_postagem . ' - ' . $postagem->nome_animal . ', foi bloqueada por um moderador para reavaliação entrar em contato com projeto.pata2019@gmail.com informando o número da postagem. </p>
                        </div>
                    </div>
                </div>
            </div>
            </div>';

            $postagem->save();
            $denuncia->save();
            //dd($usuario->email);
            $this->enviaEmail($usuario->email, $assunto, $mensagem);
        }
        return view('sucesso', ['msg'=>"Denúncia realizada com sucesso"]);


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
            $mail->CharSet = "UTF-8";
            $mail->Encoding = "base64";
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
