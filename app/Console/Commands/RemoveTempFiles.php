<?php

namespace App\Console\Commands;

use App\Services\File\FileService;
use Illuminate\Console\Command;

class RemoveTempFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:removeTempFiles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command removed last days temp files';

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
        FileService::removeTempFiles();
    }
}
