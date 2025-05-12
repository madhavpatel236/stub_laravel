<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;
use Ramsey\Uuid\Type\Integer;

use function PHPUnit\Framework\isArray;
use function PHPUnit\Framework\isBool;
use function PHPUnit\Framework\isInt;
use function PHPUnit\Framework\isString;

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
        // dd($this->argument('name'));

        return [
            'table' => $this->getSingularMigrationName($this->argument('name')['table_name']),
            'name' => $this->argument('name')['table_col_name_input'],
            'type' => $this->argument('name')['table_col_type'],
            // 'length' => $this->argument('name')['table_col_type'] = 'integer' ?? ($this->argument('name')['table_col_length'] != null ? $this->argument('name')['table_col_length'] : 4294967295) ||
            //     $this->argument('name')['table_col_type'] = 'string' ?? ($this->argument('name')['table_col_length'] != null ? $this->argument('name')['table_col_length'] : 65535) ||
            //     $this->argument('name')['table_col_type'] = 'text' ?? ($this->argument('name')['table_col_length'] != null ? $this->argument('name')['table_col_length'] : 255)
            'length' => $this->argument('name')['table_col_length'] != null ? $this->argument('name')['table_col_length'] : 255,
            'default' => $this->argument('name')['table_col_defaultVal'],
            'attributes' => $this->argument('name')['table_col_attribute'],
            'null' => $this->argument('name')['table_col_nullVal'][0] == "on" ? ['->nullable($value = true)'] : [''],
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
        // dump($stub);
        // dump($this->argument('name')['table_col_nullVal'][0]);
        dump($stubVariables);
        $c = 0;
        $contents = file_get_contents($stub);
        foreach ($stubVariables as $search => $replace) {
            if (is_array($replace)) {
                dump($search);
                dump($replace);
                $contents = str_replace('$' . $search . '$', $replace[0], $contents);
            }
            // $contents = str_replace('$' . $search . '$', $replace, $contents);
        }
        dump($contents);
        return $contents;
    }

    /**
     * @return string
     */

    public function getGenetatedMigrationPath()
    {
        // dump($this->argument('name')['table_name']); exit;
        return base_path('database/migrations/') . $this->getSingularMigrationName($this->argument('name')['table_name'][0]) . '_table.php';
    }

    /**
     * @param $name
     * @return string
     */
    public function getSingularMigrationName($name)
    {
        // dump(is_string($name)); exit;
        // return Pluralizer::singular($name);
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




// Schema::table('users', function (Blueprint $table) {
//     $table->integer('votes')->unsigned()->default(1)->comment('my comment')->change();
// });
