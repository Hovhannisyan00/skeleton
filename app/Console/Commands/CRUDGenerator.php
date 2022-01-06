<?php

namespace App\Console\Commands;

use App\CRUDGenerator\CRUDGeneratorInit;
use Illuminate\Console\Command;
use Illuminate\Contracts\Container\BindingResolutionException;

class CRUDGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '
        Command to generate CRUD:
        It will generate
        1) Request
        2) Controller
        3) Model
        4) ML Model
        5) Repository
        6) Interface
        7) Service
        8) SearchRequest
        9) ModelSearch
        10) blade creating
        11) js creating
        12) migration by class name
        13) migration ml by class name
    ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return void
     * @throws BindingResolutionException
     */
    public function handle(): void
    {
        $className = $this->ask('What is your class name?(singular)');
        $migration = $this->confirm('Do you want to create migration? (yes|no)', false);
        $migrationMl = $this->confirm('Do you want to create migration for multi language? (yes|no)', false);

        (new CRUDGeneratorInit([
            'className' => $className,
            'migration' => $migration,
            'migrationMl' => $migrationMl,
        ]))->init();
    }
}
