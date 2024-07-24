<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class FornecedorCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $fornecedor;

    /**
     * Create a new event instance.
     *
     * @param $fornecedor
     * @return void
     */
    public function __construct($fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return [];
    }
}

