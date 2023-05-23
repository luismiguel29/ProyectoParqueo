<?php

namespace App\Console\Commands;

use Carbon\Carbon;
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
        $fechamora = date('Y-m-22 15:40:00');
        $fechaactual = Carbon::parse(now())->format('Y-m-d H:i:s');
        $asunto = "adjuntar asunto";
        $contenido = "Adjuntar contenido el contenido del correo es el siguiente";
        if ($fechaactual==$fechamora) {
            $correo = User::where('estado', 0)->get();
            foreach ($correo as $mail) {
                Mail::to($mail->correo)->queue(new EnviarCorreo($asunto, $contenido));
            }

        }        
    }
}
