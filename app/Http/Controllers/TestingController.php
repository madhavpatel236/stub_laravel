<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\testingModel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class TestingController extends Controller
{
    public function index()
    {
        $database = Config::get('database.connections.mysql.database');
        // var_dump(DB::connection()->getDatabaseName());
        dump($database);
        exit;
        // var_dump('index');
        $users = testingModel::all();
        return view('Pages.testing', compact('users'));
    }

    public function create()
    {
        return view('Create.testing');
    }

    public function store(Request $request)
    {
        var_dump('store');
        exit;
        testingModel::Create($request->only(['testing',]));
        return redirect('$url$');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = testingModel::findOrFail($id);
        return view('Edit.testing',  compact('user'));
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
        $user = testingModel::findOrFail($id);
        $user->update($request->only(['testing',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = testingModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');
    }
}
