<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\EnviarCorreo;
use App\Models\Mensaje;
use App\Models\Pago;
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
        $fechamora = date('Y-m-11 H:i:s');
        $fechaactual = Carbon::parse(now())->format('Y-m-d H:i:s');
        if ($fechaactual == $fechamora) {
            $mensaje = Mensaje::where('asunto', 'like', "%mora%");
            $asunto = $mensaje->Asunto;
            $contenido = $mensaje->Descripcion;
            $pendiente = Pago::where('estado', 0)->get();
            foreach ($pendiente as $mail) {
                Mail::to($mail->pagoTitular->correo)->queue(new EnviarCorreo($asunto, $contenido));
            }
        }
    }
}
