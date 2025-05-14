<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class MakeViewCommand extends Command
{

    /**
     * @var string
     */

    protected $signature = 'make:view {name}';

    /**
     * @var string
     */
    protected $description = 'Command description- make a view.';


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
        return __DIR__ . '/../../../stubs/view.stub';
    }


    /**
     * @return array
     */
    public function getStubVariables()
    {
        // dump($this->argument('name')['table_col_name_input']); exit;
        return [
            'name' => $this->argument('name')['table_col_name_input'],
            'type' => $this->argument('name')['table_col_type'],
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
        // dump(($this->argument('name')));
        $contents = file_get_contents($stub);
        // dump($stubVariables);
        // dump($this->argument("name")["table_col_name_input"]);

        $val = '';
        for ($i = 0; $i < $this->argument('name')['col_count']; $i++) {
            $val .= '
                <lable> ' . $this->argument("name")["table_col_name_input"][$i] . ':</lable>
                <input class= ' . '"' . $this->argument("name")["table_col_type"][$i] . '"' . '  , ' . 'name=' . '"' . $this->argument("name")["table_col_name_input"][$i] . '"' . '/> <br/> <br/>
            ';
        }

        $th = '';
        for ($i = 0; $i < $this->argument('name')['col_count']; $i++) {
            $th .=  '<th>' . $this->argument('name')['table_col_name_input'][$i] . '</th>';
        }
        $th .= '<th> Edit </th>'; // for the edit and delete btn
        $thead = '<tr>' . $th . '</tr>';


        $tbody = '<tr></tr>';

        $action = "{{route('user.storetablename')}}";

        $contents = str_replace('$' . 'INPUT_FIELDS' . '$', $val, $contents);
        $contents = str_replace('$' . 'action' . '$', $action, $contents);

        $contents = str_replace('$' . 'type' . '$', $stubVariables['name'][0], $contents);
        $contents = str_replace('$' . 'name' . '$', $stubVariables['type'][0], $contents);
        $contents = str_replace('$' . 'tableHead' . '$', $thead, $contents);
        $contents = str_replace('$' . 'tableBody' . '$', $tbody, $contents);

        dump($contents);


        return $contents;
    }

    /**
     * @return string
     */

    public function getGenetatedControllerPath()
    {
        // dump(base_path('resources/views/Pages/') . $this->getSingularControllerName($this->argument('name')['table_name'][0]) . '.blade.php'); exit;
        return base_path('resources/views/Pages/') . $this->getSingularControllerName($this->argument('name')['table_name'][0]) . '.blade.php';
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
