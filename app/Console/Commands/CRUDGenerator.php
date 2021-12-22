<?php

namespace App\Console\Commands;

use App\CRUDGenerator\CRUDGeneratorInit;
use Illuminate\Console\Command;

class CRUDGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generator {--m} {--ml}';

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
        4) Repository
        5) Interface
        6) Service
        7) SearchRequest
        8) ModelSearch
        9) blade creating
        10) js creating
        11) migration by class name
        12) migration ml by class name
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


    public function handle()
    {
        $migration = $this->option('m');
        $migrationMl = $this->option('ml');
        $className = $this->ask('What is your class name?');

        (new CRUDGeneratorInit([
            'className' => $className,
            'migration' => $migration,
            'migrationMl' => $migrationMl,
        ]))->init();
    }
}
