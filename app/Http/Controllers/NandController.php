<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nandModel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class NandController extends Controller
{
    public function index()
    {
        // $database = Config::get('database.connections.mysql.database');
        // dump($database);
        // var_dump(DB::connection()->getDatabaseName());
        var_dump(DB::connection()->getDatabaseName());
        exit;
        $users = nandModel::all();
        return view('Pages.nand', compact('users'));
    }

    public function create()
    {
        return view('Create.nand');
    }

    public function store(Request $request)
    {
        var_dump('store');
        exit;
        nandModel::Create($request->only(['nand',]));
        return redirect('$url$');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = nandModel::findOrFail($id);
        return view('Edit.nand',  compact('user'));
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
        $user = nandModel::findOrFail($id);
        $user->update($request->only(['nand',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = nandModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');
    }
}
