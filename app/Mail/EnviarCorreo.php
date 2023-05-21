<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;

class EnviarCorreo extends Mailable
{
    use Queueable, SerializesModels;

    protected $asunto, $contenido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($asunto, $contenido )
    {
        $this->asunto = $asunto;
        $this->contenido = $contenido;

    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->asunto)
                    ->view('vehiculo.prueba')
                    ->with([
                        'contenido' => $this->contenido,
                    ]);
    }
}
