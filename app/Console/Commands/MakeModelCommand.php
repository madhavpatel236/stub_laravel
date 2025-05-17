<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class MakeModelCommand extends Command
{

    /**
     * @var string
     */

    protected $signature = 'make:model {name}';

    /**
     * @var string
     */
    protected $description = 'Command description- make a model from the console command';


    /**
     * Create a new command instance.
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
        dump(($this->argument('name')));

        $path = $this->getGenetatedModelPath();
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
        return __DIR__ . '/../../../stubs/model.stub';
    }


    /**
     * @return array
     */
    public function getStubVariables()
    {
        return [
            'namespace' => 'app\\Models',
            'class' => $this->getSingularModelName($this->argument('name')[0]),
            'rootNamespace' => 'App\\'
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
        $fillableVal = '';
        foreach (($this->argument('name')['table_col_name_input']) as $key => $val) {
            $fillableVal .= "'" . $val . "'" . ",";
        }
        

        $contents = str_replace('$' . 'class' . '$', $stubVariables['class'], $contents);
        $contents = str_replace('$' . 'namespace' . '$', "App\Models", $contents);
        $contents = str_replace('$' . 'tableName' . '$', "'" . $this->argument('name')['table_name'] . "'", $contents);
        $contents = str_replace('$' . 'dbname' . '$', "'" . $this->argument('name')['db_name'] . "'", $contents);
        $contents = str_replace('$' . 'fillable' . '$',  $fillableVal, $contents);
        return $contents;
    }

    /**
     * @return string
     */

    public function getGenetatedModelPath()
    {
        return base_path('app/Models/') . $this->getSingularModelName($this->argument('name')[0]) . '.php';
    }

    /**
     * @param $name
     * @return string
     */
    public function getSingularModelName($name)
    {
        // return ucwords(Pluralizer::singular($name));
        return ucwords($name);
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
