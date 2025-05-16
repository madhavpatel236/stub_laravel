<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\try4Model;
use Illuminate\Support\Facades\Config;

class Try4Controller extends Controller
{
    public function index()
    {
        // var_dump('index');
        // exit;
        $database = Config::get('database.connections.mysql.database');
        dump($database);

        $users = try4Model::all();
        return view('Pages.try4', compact('users'));
    }

    public function create()
    {
        return view('Create.try4');
    }

    public function store(Request $request)
    {
        var_dump('store');
        exit;
        try4Model::Create($request->only(['try',]));
        return redirect('$url$');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = try4Model::findOrFail($id);
        return view('Edit.try4',  compact('user'));
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
        $user = try4Model::findOrFail($id);
        $user->update($request->only(['try',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = try4Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');
    }
}
