<?php

namespace App\Console\Commands;

use App\CRUDGenerator\CRUDGeneratorDelete;
use Illuminate\Console\Command;

/**
 * Class CRUDGeneratorRemove
 * @package App\Console\Commands
 */
class CRUDGeneratorRemove extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for delete created crud';

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
     * Function to remove crud generated data
     *
     * @return void
     */
    public function handle(): void
    {
        $className = $this->ask('What is your class name?');

        (new CRUDGeneratorDelete([
            'className' => $className,
        ]))->deleteCrudData();
    }
}
