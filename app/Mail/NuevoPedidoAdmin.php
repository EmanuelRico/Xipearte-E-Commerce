<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevoPedidoAdmin extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from('pruebasxipearte@gmail.com','Pedidos Xipearte')
        ->subject('Nuevo pedido en Xipearte')
        ->markdown('emails.nuevoPedidoAdmin')
        ->with('data',$this->data);
    }
}