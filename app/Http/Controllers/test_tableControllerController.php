<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\test_tableModel;


class test_tableController extends Controller
{
    public function index()
    {
         $users =test_tableModel::all();
         return view('Pages.test_table', compact('users'));
    }

    public function create()
    {
        return view('Create.test_table' );
    }

    public function store(Request $request)
    {
        test_tableModel::Create($request->only(['col1','col2',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = test_tableModel::findOrFail($id);
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
        $user = test_tableModel::findOrFail($id);
        $user->update($request->only(['col1','col2',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = test_tableModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
