<?php

namespace IslomiddinDev\GeneratingRepositoryAndService;

use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->commands([
            Console\Commands\MakeRepository::class,
            Console\Commands\MakeService::class,
        ]);
    }
}
