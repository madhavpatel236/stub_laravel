<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test1234Model;


class Test1234Controller extends Controller
{
    public function index()
    {
         $users =Test1234Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.test1234' );
    }

    public function store(Request $request)
    {
        // var_dump('store'); exit;
        Test1234Model::Create($request->only(['col1','col2',]));
        // return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Test1234Model::findOrFail($id);
        return view('Edit.test1234',  compact('user'));
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
        $user = Test1234Model::findOrFail($id);
        $user->update($request->only(['col1','col2',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Test1234Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
