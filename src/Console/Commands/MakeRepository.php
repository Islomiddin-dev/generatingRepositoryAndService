<?php

namespace IslomiddinDev\GeneratingRepositoryAndService\Console\Commands;

use Illuminate\Console\Command;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name}';
    protected $description = 'Create a new repository';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = $this->argument('name');
        $stubInterface = file_get_contents(__DIR__ . '/../../Stubs/RepositoryInterface.stub');
        $stubInterface = str_replace('Model', $name, $stubInterface);

        $stub = file_get_contents(__DIR__ . '/../../Stubs/Repository.stub');
        $stub = str_replace('Model', $name, $stub);

        if (!file_exists(app_path('Interfaces/Repositories'))) {
            mkdir(app_path('Interfaces/Repositories'), 0777, true);
        }

        file_put_contents(app_path("Interfaces/Repositories/{$name}RepositoryInterface.php"), $stubInterface);
        $this->info("[Interfaces/Repositories/{$name}RepositoryInterface.php] repository interface created successfully");

        if (!file_exists(app_path('Repositories'))) {
            mkdir(app_path('Repositories'), 0777, true);
        }

        file_put_contents(app_path("Repositories/{$name}Repository.php"), $stub);
        $this->info("[Repositories/{$name}Repository.php] repository created successfully");
    }
}
