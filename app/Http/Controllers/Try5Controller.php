<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Try5Model;
use Illuminate\Support\Facades\Config;

class Try5Controller extends Controller
{
    public function index()
    {
        $database = Config::get('database.connections.mysql.database');
        // var_dump(DB::connection()->getDatabaseName());
        dump($database); exit;

        var_dump('index');
        exit;
        $users = Try5Model::all();
        return view('Pages.try5', compact('users'));
    }

    public function create()
    {
        return view('Create.try5');
    }

    public function store(Request $request)
    {
        var_dump('store');
        exit;
        Try5Model::Create($request->only(['try',]));
        return redirect('$url$');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = Try5Model::findOrFail($id);
        return view('Edit.try5',  compact('user'));
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
        $user = Try5Model::findOrFail($id);
        $user->update($request->only(['try',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Try5Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');
    }
}
