<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Mail\EnviarCorreo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotificacionMora extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notificacion:mora';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio de notificacion por mora de pago';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $correo = User::all();
        $asunto = "adjuntar asunto";
        $contenido = "Adjuntar contenido el contenido del correo es el siguiente";
        foreach ($correo as $mail) {
            Mail::to($mail->correo)->queue(new EnviarCorreo($asunto, $contenido));
        }
    }
}
