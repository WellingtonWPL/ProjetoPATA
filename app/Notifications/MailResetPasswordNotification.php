<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $link = url( "/password/reset/" . $this->token );

        return ( new MailMessage )
           ->subject( 'Recuperação de Senha' )
           ->greeting('Olá!')
           ->line( "Você solicitou alteração de senha, caso não tenha feito isso desconsidere esse email!" )
           ->line( "Clique no botão abaixo para alterar sua senha." )
           ->action( 'Recuperar Senha', $link )
           ->line( 'Obrigado!' )
           ->salutation("\r\n\r\n Equipe ProjetoPATA");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
