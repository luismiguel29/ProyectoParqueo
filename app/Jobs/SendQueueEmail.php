<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Cliente;
use App\Models\Mensaje;
use Mail;
use App\Mail\Message;

class SendQueueEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $mensaje;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    
    public function __construct(Mensaje $mensaje){
        $this -> mensaje = $mensaje;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = Cliente::all();
        foreach ($data as $value){
            Mail::to($value->correo)->send(new Message($this->mensaje));
        }
    }
}
