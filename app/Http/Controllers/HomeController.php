<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Config as AttributesConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

        // Storage::disk('local')->put('controllerName', $request->input('table_name_input') . 'Controller');
        // dump($request->all());
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

        Storage::put('newController', $request->input('table_name_input') . 'Controller');
        // $storeController = Storage::get('newController');
        // dump($storeController);


        // Artisan::call('make:model', ['name' => $request->input('table_name_input') . 'Model']); // add the fillable in the argument
        Artisan::call('make:model', ['name' => [
            $request->input('table_name_input') . 'Model',
            'db_name' => 'demo',
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

        return view('Pages.' . $request->input('table_name_input'))->with('data', 'madhav');
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

        dd('storetablename');
    }
}
