<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test_table2Model;


class Test_table2Controller extends Controller
{
    public function index()
    {
        $users = Test_table2Model::all();
        var_dump($users);
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.test_table2');
    }

    public function store(Request $request)
    {
        var_dump('store');
        exit;
        Test_table2Model::Create($request->only(['name',]));
        return redirect('$url$');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = Test_table2Model::findOrFail($id);
        return view('Edit.test_table2',  compact('user'));
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
        $user = Test_table2Model::findOrFail($id);
        $user->update($request->only(['name',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Test_table2Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');
    }
}
