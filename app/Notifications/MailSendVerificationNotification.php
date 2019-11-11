<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailSendVerificationNotification extends Notification
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
        $link = url( "/login" . $this->token );

        return ( new MailMessage )
           ->view('/verify')
           ->subject( 'Email de Verificação' )
           ->greeting('Olá!')
           ->line( "Você se cadastrou recentemente no PATA, caso não tenha feito isso desconsidere esse email!" )
           ->line( "Clique no botão abaixo para confirmar seu cadastro." )
           ->action( 'Confirmar Email', $link )
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
