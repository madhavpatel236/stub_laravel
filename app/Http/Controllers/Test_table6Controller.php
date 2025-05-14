<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\test_table6Model;


class Test_table6Controller extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =test_table6Model::all();
         return view('Pages.test_table6', compact('users'));
    }

    public function create()
    {
        return view('Create.test_table6' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        test_table6Model::Create($request->only(['col1','col2',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = test_table6Model::findOrFail($id);
        return view('Edit.test_table6',  compact('user'));
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
        $user = test_table6Model::findOrFail($id);
        $user->update($request->only(['col1','col2',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = test_table6Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
