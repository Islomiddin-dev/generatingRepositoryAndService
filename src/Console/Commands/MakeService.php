<?php

namespace IslomiddinDev\GeneratingRepositoryAndService\Console\Commands;

use Illuminate\Console\Command;

class MakeService extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service';

    public function handle()
    {
        $name = $this->argument('name');

        $stubInterface = file_get_contents(__DIR__ . '/../../Stubs/ModelServiceInterface.stub');
        $stubInterface = str_replace('Model', $name, $stubInterface);
        $interfacePath = app_path("Interfaces/Services/{$name}ServiceInterface.php");

        if (!file_exists(app_path('Interfaces/Services'))) {
            mkdir(app_path('Interfaces/Services'), 0777, true);
        }

        file_put_contents($interfacePath, $stubInterface);
        $this->info("[{$interfacePath}] service interface created successfully");

        $stub = file_get_contents(__DIR__ . '/../../Stubs/ModelService.stub');
        $stub = str_replace('Model', $name, $stub);
        $stub = str_replace('model', strtolower($name), $stub);
        $repositoryPath = app_path("Services/{$name}Service.php");

        if (!file_exists(app_path('Services'))) {
            mkdir(app_path('Services'), 0777, true);
        }

        file_put_contents($repositoryPath, $stub);
        $this->info("[{$repositoryPath}] service created successfully");
    }
}
