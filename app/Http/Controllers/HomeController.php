<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Config as AttributesConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

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
        // dump('store');
        // dump($request->all());
        // env('DB_DATABASE', $request->input('db_name_input'));
        // config()->set('DB_DATABASE', $request->input('db_name_input') );
        // Config::set('database', $request->input('db_name_input'));
        Artisan::call('config:cache');
        Config::set('database.connections.mysql.database', $request->input('db_name_input'));
        Artisan::call('make:migration', ['name' => $request->input('table_name_input')]);
        // Artisan::call('migrate');
        // dump(Artisan::call('migrate --path=/database/migrations/' . $request->input('table_name_input') . '_table.php'));
        // Artisan::call('migrate --path=/database/migrations/' . $request->input('table_name_input'));
        Artisan::call('make:controller', ['name' => $request->input('table_name_input')]);
        Artisan::call('make:model', ['name' => $request->input('table_name_input')]);
        Artisan::call('make:view Pages/'. $request->input('table_name_input'));
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
}
