<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class MakeMigrationCommand extends Command
{

    /**
     * @var string
     */

    protected $signature = 'make:migration {name}';

    /**
     * @var string
     */
    protected $description = 'Command description- make a migration from the console command';


    /**
     * @param Filesystem $files
     */
    public $files;
    public function __construct(FileSystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle()
    {
        $path = $this->getGenetatedMigrationPath();
        $this->makeDireactory(dirname($path));
        $contents = $this->getSourceFile();

        if (! $this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("file: {$path} already exists");
        }
    }

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getStubPath()
    {
        return __DIR__ . '/../../../stubs/migration.create.stub';
    }


    /**
     * @return array
     */
    public function getStubVariables()
    {
        return [
            // 'namespace' => 'database\\migrations',
            // 'class' => $this->getSingularMigrationName($this->argument('name')),
            'table' => $this->getSingularMigrationName($this->argument('name'))
            // 'rootNamespace' => 'App\\'
        ];
    }

    /**
     * @return bool|mixed|string
     */
    public function getSourceFile()
    {
        // dump($this->getStubVariables()); exit;
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }

    /**
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */

    public function getStubContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);
        foreach ($stubVariables as $search => $replace) {
            // dump($replace); exit;
            $contents = str_replace('$' . $search . '$', $replace, $contents);
        }
        return $contents;
    }

    /**
     * @return string
     */

    public function getGenetatedMigrationPath()
    {
        return base_path('database/migrations/') . $this->getSingularMigrationName($this->argument('name')) . '_table.php';
    }

    /**
     * @param $name
     * @return string
     */
    public function getSingularMigrationName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }


    /**
     * @param  string  $path
     * @return string
     */
    public function makeDireactory($path)
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }
        return $path;
    }
}
