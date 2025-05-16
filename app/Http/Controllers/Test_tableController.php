<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test_tableModel;


class Test_tableController extends Controller
{
    public function index()
    {
         $users =Test_tableModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.test_table' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        Test_tableModel::Create($request->only(['name','age',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Test_tableModel::findOrFail($id);
        return view('Edit.test_table',  compact('user'));
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
        $user = Test_tableModel::findOrFail($id);
        $user->update($request->only(['name','age',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Test_tableModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
