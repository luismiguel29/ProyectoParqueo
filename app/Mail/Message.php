<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Mensaje;
use App\Models\Cliente;
class Message extends Mailable
{
    use Queueable, SerializesModels;
    public $mensaje;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Mensaje $mensaje){
        $this -> mensaje = $mensaje;
    }

    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mensaje-> Asunto)->markdown('emails.message');
        
    }
}