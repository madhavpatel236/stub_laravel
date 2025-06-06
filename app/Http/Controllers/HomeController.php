<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Config as AttributesConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Pages.Home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $count = 0;
        $table_col_name_input = [];
        $table_col_type = [];
        $table_col_defaultVal = [];
        $table_col_attribute = [];
        $table_col_nullVal = [];
        $table_col_index = [];
        $table_col_AI = [];
        $table_col_comment = [];
        $table_col_length = [];
        $count_stub = [];

        Artisan::call('config:cache');
        Config::set('database.connections.mysql.database', $request->input('db_name_input'));
        // DB::purge('mysql');
        // DB::reconnect('mysql');


        while ($request->input('table_col_name_input' . $count) != null) {
            array_push($table_col_name_input, $request->input('table_col_name_input' . $count));
            array_push($table_col_type, $request->input('table_col_type' . $count));
            array_push($table_col_length, $request->input('table_col_length' . $count));
            array_push($table_col_defaultVal, $request->input('table_col_defaultVal' . $count));

            array_push($table_col_attribute, $request->input('table_col_attribute' . $count));
            array_push($table_col_nullVal, $request->input('table_col_nullVal' . $count));
            array_push($table_col_index, $request->input('table_col_index' . $count));
            array_push($table_col_AI, $request->input('table_col_AI' . $count));
            array_push($table_col_comment, $request->input('table_col_comment' . $count));
            // array_push($count_stub, $count);
            $count = $count + 1;
        }

        Artisan::call('make:migration', ['name' => [
            'table_name' => [$request->input('table_name_input')],
            'table_col_name_input' => $table_col_name_input,
            'table_col_type' => $table_col_type,
            'table_col_length' => $table_col_length,
            'table_col_defaultVal' => $table_col_defaultVal,
            'table_col_attribute' => $table_col_attribute,
            'table_col_nullVal' => $table_col_nullVal,
            'table_col_index' => $table_col_index,
            'table_col_AI' => $table_col_AI,
            'table_col_comment' => $table_col_comment,
            'col_count' => count($table_col_name_input),
        ]]);

        Artisan::call('migrate --path=/database/migrations/' . $request->input('table_name_input') . '_table.php');
        // Artisan::call('migrate --path=/database/migrations/' . $request->input('table_name_input'));
        Artisan::call('make:controller', ['name' => [
            $request->input('table_name_input') . 'Controller',
            'db_name' => 'demo',
            'table_name' => $request->input('table_name_input'),
            'table_col_name_input' => $table_col_name_input,
        ]]);


        $controllerName = ucfirst($request->input('table_name_input') . 'Controller');
        $this->addDynamicRoute($controllerName);


        // dump($request->input('db_name_input')); exit;
        $dbName = ($request->input('db_name_input'));
        $this->addDynamicDatabase($dbName);

        // Artisan::call('make:model', ['name' => $request->input('table_name_input') . 'Model']); // add the fillable in the argument
        Artisan::call('make:model', ['name' => [
            $request->input('table_name_input') . 'Model',
            'db_name' => $request->input('db_name_input'),
            'table_name' => $request->input('table_name_input'),
            'table_col_name_input' => $table_col_name_input,
        ]]);

        // dump($request->input('table_name_input'). 'Controller');
        Artisan::call('make:view', ['name' => [
            'table_name' => [$request->input('table_name_input')],
            'table_col_name_input' => $table_col_name_input,
            'table_col_type' => $table_col_type,
            'table_col_length' => $table_col_length,
            'table_col_defaultVal' => $table_col_defaultVal,
            'table_col_attribute' => $table_col_attribute,
            'table_col_nullVal' => $table_col_nullVal,
            'table_col_index' => $table_col_index,
            'table_col_AI' => $table_col_AI,
            'table_col_comment' => $table_col_comment,
            'col_count' => count($table_col_name_input),
        ]]);


        // var_dump(ucfirst($request->input('table_name_input')) . 'Controller.index');
        // exit;
        return redirect()->route(ucfirst($request->input('table_name_input')) . 'Controller.index');
        // return view('Pages.' . $request->input('table_name_input'))->with('data', 'madhav');
        // return redirect()->route(Str::kebab($request->input('table_name_input')) . '.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function storetablename(Request $request)
    {

        // dd('storetablename');
    }

    // public function addDynamicRoute($controllerName)
    // {
    //     // dump($controllerName); exit;
    //     $routePath = base_path('routes/web.php');
    //     dump($routePath);
    //     $slug = ucfirst(str_replace('Controller', '', $controllerName));
    //     dump($slug);
    //     // exit;

    //     $routeCode = <<<PHP
    //     use App\\Http\\Controllers\\{$controllerName};
    //     Route::resource('/{$controllerName}', {$controllerName}::class);

    //     PHP;
    //     file_put_contents($routePath, $routeCode, FILE_APPEND);
    // }
    public function addDynamicRoute($controllerName)
    {
        $routePath = base_path('routes/web.php');
        $controllerClass = "App\\Http\\Controllers\\$controllerName";

        // Route path exactly matches controller name
        $routeUrl = $controllerName;

        // Read web.php contents
        $fileContents = file_get_contents($routePath);

        // Generate use and route lines
        $useLine   = "use $controllerClass;";
        $routeLine = "Route::resource('$routeUrl', $controllerName::class);";

        // Avoid duplicates
        if (str_contains($fileContents, $useLine) || str_contains($fileContents, $routeLine)) {
            return;
        }

        // Replace placeholders
        $fileContents = str_replace(
            '// [USE_CONTROLLERS]',
            "$useLine\n// [USE_CONTROLLERS]",
            $fileContents
        );

        $fileContents = str_replace(
            '// [ROUTE_CONTROLLERS]',
            "$routeLine\n// [ROUTE_CONTROLLERS]",
            $fileContents
        );

        // Save file
        file_put_contents($routePath, $fileContents);
    }

    public function addDynamicDatabase($dbname)
    {
        $routePath = base_path('config/database.php');
        $fileContents = file_get_contents($routePath);

        $content = "
        '{$dbname}' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', '{$dbname}'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', 'Madhav@123'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ],
            ) : [],
        ],";

        if (str_contains($fileContents, $content)) {
            return;
        }

        $fileContents = str_replace(
            '// [NEWDB]',
            "$content\n// [NEWDB]",
            $fileContents
        );

        file_put_contents($routePath, $fileContents);
    }
}
