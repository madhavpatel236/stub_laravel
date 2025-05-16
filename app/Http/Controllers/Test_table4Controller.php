<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test_table4Model;


class Test_table4Controller extends Controller
{
    public function index()
    {
         $users =Test_table4Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.test_table4' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        Test_table4Model::Create($request->only(['test',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Test_table4Model::findOrFail($id);
        return view('Edit.test_table4',  compact('user'));
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
        $user = Test_table4Model::findOrFail($id);
        $user->update($request->only(['test',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Test_table4Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
