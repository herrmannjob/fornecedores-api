<?php

namespace App\Listeners;

use App\Events\FornecedorCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendFornecedorNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  FornecedorCreated  $event
     * @return void
     */
    public function handle(FornecedorCreated $event)
    {
        // Envie a notificação ou faça alguma outra ação
        // Aqui você pode acessar o fornecedor usando $event->fornecedor
    }
}

