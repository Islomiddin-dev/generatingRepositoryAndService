<?php

namespace IslomiddinDev\GeneratingRepositoryAndService\Console\Commands;

use Illuminate\Console\Command;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name}';
    protected $description = 'Create a new repository';

    public function handle()
    {
        $name = $this->argument('name');

        $stubInterface = file_get_contents(__DIR__ . '/../../Stubs/ModelRepositoryInterface.stub');
        $stubInterface = str_replace('Model', $name, $stubInterface);
        $interfacePath = app_path("Interfaces/Repositories/{$name}RepositoryInterface.php");

        if (!file_exists(app_path('Interfaces/Repositories'))) {
            mkdir(app_path('Interfaces/Repositories'), 0777, true);
        }

        file_put_contents($interfacePath, $stubInterface);
        $this->info("[{$interfacePath}] repository interface created successfully");

        $stub = file_get_contents(__DIR__ . '/../../Stubs/ModelRepository.stub');
        $stub = str_replace('Model', $name, $stub);
        $repositoryPath = app_path("Repositories/{$name}Repository.php");

        if (!file_exists(app_path('Repositories'))) {
            mkdir(app_path('Repositories'), 0777, true);
        }

        file_put_contents($repositoryPath, $stub);
        $this->info("[{$repositoryPath}] repository created successfully");
    }
}
