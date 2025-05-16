<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Try6Model;
use Illuminate\Support\Facades\Config;

class Try6Controller extends Controller
{
    public function index()
    {
        $database = Config::get('database.connections.mysql.database');
        // var_dump(DB::connection()->getDatabaseName());
        dump($database);
        exit;
        var_dump('index');
        exit;
        $users = Try6Model::all();
        return view('Pages.try6', compact('users'));
    }

    public function create()
    {
        return view('Create.try6');
    }

    public function store(Request $request)
    {
        var_dump('store');
        exit;
        Try6Model::Create($request->only(['try',]));
        return redirect('$url$');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = Try6Model::findOrFail($id);
        return view('Edit.try6',  compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'lastName' => 'required'
        ]);
        $user = Try6Model::findOrFail($id);
        $user->update($request->only(['try',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Try6Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');
    }
}
