<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;

class EnviarCorreo extends Mailable
{
    use Queueable, SerializesModels;

    protected $mensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensaje )
    {
        $this->mensaje = $mensaje;

    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mensaje->asunto)
                    ->view('emails.moraporpago')
                    ->with([
                        'asunto' => $this->mensaje->asunto,
                        'descripcion' => $this->mensaje->descripcion,
                    ]);
    }
}
