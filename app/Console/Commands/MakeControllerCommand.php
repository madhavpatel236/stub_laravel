<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class MakeControllerCommand extends Command
{

    /**
     * @var string
     */

    protected $signature = 'make:controller {name}';

    /**
     * @var string
     */
    protected $description = 'Command description- make a controller,model and do a migration .';


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
        // dump($this->argument('name')['table_name']);exit;
        $path = $this->getGenetatedControllerPath();
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
        return __DIR__ . '/../../../stubs/controller.stub';
    }


    /**
     * @return array
     */
    public function getStubVariables()
    {
        return [
            'namespace' => 'app\\Http\\Controller',
            'class' => $this->getSingularControllerName($this->argument('name')),
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
        dump(($this->argument('name')));
        $contents = file_get_contents($stub);
        // dump($contents);
        $contents = str_replace('$' . 'class' . '$', $this->argument('name')[0], $contents);
        $contents = str_replace('$' . 'namespace' . '$', 'App\Http\Controllers', $contents);
        $contents = str_replace('$' . 'UserModel' . '$', $this->argument('name')['table_name'] . 'Model', $contents);
        $contents = str_replace('$' . 'viewFileName' . '$', $this->argument('name')['table_name'], $contents);

        $val = '';

        for ($i = 0; $i < count($this->argument('name')['table_col_name_input']); $i++) {
            // $value = array_push($val, $this->argument('name')['table_col_name_input'][$i]  );
            // dump($val[$i]);
            $val .= "'". $this->argument('name')['table_col_name_input'][$i] . "'" . ',';
        }
        $contents = str_replace('$' . 'storeData' . '$', $val , $contents);
        dump($contents);
        return $contents;
    }

    /**
     * @return string
     */

    public function getGenetatedControllerPath()
    {
        return base_path('app/Http/Controllers/') . $this->getSingularControllerName($this->argument('name')[0]) . 'Controller.php';
    }

    /**
     * @param $name
     * @return string
     */
    public function getSingularControllerName($name)
    {
        // return ucwords(Pluralizer::singular($name));
        return $name;
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
