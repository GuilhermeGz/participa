<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class recuperacaoSenha extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
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
        return (new MailMessage)->from('lmtsteste@gmail.com', 'Participa')
                    ->subject('Sistema Participa - Recuperação de senha')
                    ->greeting('Olá!')
                    ->line('Você está recebendo este e-mail porque nós recebemos uma requisição de redefinição de senha para a sua conta.')
                    ->action('Redefinir Senha', route('password.reset', $this->token))
                    ->line('Se você não solicitou esta recuperação de senha, apenas ignore este e-mail.')
                    ->markdown('vendor.notifications.email');
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
