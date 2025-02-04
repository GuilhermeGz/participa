<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailParaUsuarioNaoCadastrado extends Mailable
{
    use Queueable, SerializesModels;

    public $nomeUsuarioPai;

    public $nomeTrabalho;

    public $nomeFuncao;

    public $nomeEvento;

    public $senhaTemporaria;

    public $email;

    public $coord;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $nomeUsuarioPai, String $nomeTrabalho,
        String $nomeFuncao, String $nomeEvento, String $senhaTemporaria, String $email, $coord)
    {
        $this->nomeUsuarioPai = $nomeUsuarioPai;
        $this->nomeTrabalho = $nomeTrabalho;
        $this->nomeFuncao = $nomeFuncao;
        $this->nomeEvento = $nomeEvento;
        $this->senhaTemporaria = $senhaTemporaria;
        $this->email = $email;
        $this->coord = $coord;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return  $this->from('lmtsteste@gmail.com', 'Participa ')
                    ->subject('Ative sua conta')
                    ->markdown('emails.usuarioNaoCadastrado')->with([
                        'user' => $this->nomeUsuarioPai,
                        'evento' => $this->nomeEvento,
                        'funcao' => $this->nomeFuncao,
                        'senha' => $this->senhaTemporaria,
                        'coord' => $this->coord,
                    ]);

        // return $this->view('emails.usuarioNaoCadastrado');
    }
}
