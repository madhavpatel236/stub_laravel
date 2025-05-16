<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Try7Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Try7Controller extends Controller
{
    public function index()
    {
        // print_r(DB::connection('')->getDatabaseName());
        // $database = Config::get('database.connections.try7.database');
        // dump($database);
        // var_dump('index');
        // exit;
        $users = Try7Model::all();
        // var_dump(compact($users));
        return $users;
        // return view('Pages.try7', compact('users'));
    }

    public function create()
    {
        return view('Create.try7');
    }

    public function store(Request $request)
    {
        var_dump('store');
        exit;
        Try7Model::Create($request->only(['try',]));
        return redirect('$url$');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = Try7Model::findOrFail($id);
        return view('Edit.try7',  compact('user'));
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
        $user = Try7Model::findOrFail($id);
        $user->update($request->only(['try',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Try7Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');
    }
}
