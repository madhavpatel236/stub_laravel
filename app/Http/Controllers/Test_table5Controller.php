<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test_table5Model;


class Test_table5Controller extends Controller
{
    public function index()
    {
        $users = Test_table5Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.test_table5');
    }

    public function store(Request $request)
    {
        var_dump('store');
        exit;
        Test_table5Model::Create($request->only(['test',]));
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = Test_table5Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Test_table5Model::findOrFail($id);
        $user->update($request->only(['test',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Test_table5Model::findOrFail($id);
        $user->delete();
    }
}
