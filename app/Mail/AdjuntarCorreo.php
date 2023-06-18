<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdjuntarCorreo extends Mailable
{
    use Queueable, SerializesModels;

    protected $mensaje, $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensaje, $pdf)
    {
        $this->mensaje = $mensaje;
        $this->pdf = $pdf;

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
                    ->attachData($this->pdf->output(), 'comprobantee.pdf')
                    ->with([
                        'asunto' => $this->mensaje->asunto,
                        'descripcion' => $this->mensaje->descripcion,
                    ]);
    }
}
