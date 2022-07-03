<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TrabajoAsignadoMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Se te asignó un trabajo";
    public $contenido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($trabajo)
    {
        $this->contenido = $trabajo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.trabajos.asignado');
    }
}
