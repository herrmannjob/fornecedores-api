<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\FornecedorCreated;
use App\Listeners\SendFornecedorNotification;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        FornecedorCreated::class => [
            SendFornecedorNotification::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }

    public function shouldDiscoverEvents()
    {
        return false;
    }
}




