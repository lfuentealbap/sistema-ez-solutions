<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TrabajoSuspendidoMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Se te suspendió un trabajo";
    public $contenido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($trabajo, $motivo)
    {
        $this->contenido = $trabajo;
        $this->contenido['motivo'] = $motivo;
        $this->contenido['fecha_inicio'] = Carbon::parse($this->contenido['fecha_inicio'])->format('d-m-Y H:i:s');
        $this->contenido['fecha_termino'] = Carbon::parse($this->contenido['fecha_termino'])->format('d-m-Y H:i:s');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.trabajos.suspendido');
    }
}
