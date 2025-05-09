<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Nette\Utils\FileSystem;

class MakeMigrationCommand extends Command
{

    public $files;
    public function __construct(FileSystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * @var string
     */

    // protected $signature = 'app:make-interface-command';
    protected $signature = 'make:migration {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description- make a migration .';





    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
