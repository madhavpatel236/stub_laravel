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
        // 1 : dump('handle'); exit;
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
        // 6 : dump('getStubPath'); exit;
        return __DIR__ . '/../../../stubs/migration.create.stub';
    }


    /**
     * @return array
     */
    public function getStubVariables()
    {
        // 7 : dump('getStubVariables'); exit;
        // dd($this->argument('name')['table_col_comment']); exit;
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
            // 'null' => $this->argument('name')['table_col_nullVal'][0] == "on" ? ['->nullable($value = true)'] : [''],
            'null' => $this->argument('name')['table_col_nullVal'],
            'index' => $this->argument('name')['table_col_index'],
            // 'comments' => "->comment('" .  $this->argument('name')['table_col_comment']  . "')",
            'comments' =>  $this->argument('name')['table_col_comment'],

        ];
    }

    /**
     * @return bool|mixed|string
     */
    public function getSourceFile()
    {
        // 5 : dump('getSourceFile'); exit;
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
        // 8 : dump('getStubContents'); exit;
        // dump($stubVariables);
        // dump(count(($stubVariables)['name'])); exit;
        $contents = file_get_contents($stub);
        for ($i = 0; $i < count($stubVariables['name']); $i++) {
            foreach ($stubVariables as $search => $replace) {
                // dump($search );
                dump($replace);
                // ->nullable($value = true)
                if ($search == 'null' && $replace[$i] == 'on') {
                    $contents = str_replace('$' . null . '$', '->nullable($value = true)', $contents);
                } elseif (is_array($replace)) {
                    $contents = str_replace('$' . $search . '$', $replace[$i], $contents);
                }
            }
            dump($contents);
            // exit;
            // exit;
        }
        // dump($contents);
        return $contents;
    }

    /**
     * @return string
     */

    public function getGenetatedMigrationPath()
    {
        // 2 : dump('getGenetatedMigrationPath'); exit;
        // dump($this->argument('name')['table_name']); exit;
        return base_path('database/migrations/') . $this->getSingularMigrationName($this->argument('name')['table_name'][0]) . '_table.php';
    }

    /**
     * @param $name
     * @return string
     */
    public function getSingularMigrationName($name)
    {

        // 3 : dump('getSingularMigrationName'); exit;
        // return Pluralizer::singular($name);
        return $name;
    }


    /**
     * @param  string  $path
     * @return string
     */
    public function makeDireactory($path)
    {
        // 4 : dump('makeDireactory'); exit;
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }
        return $path;
    }
}




// Schema::table('users', function (Blueprint $table) {
//     $table->integer('votes')->unsigned()->default(1)->comment('my comment')->change();
// });
