<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test09Model;


class Test09Controller extends Controller
{
    public function index()
    {
         $users =Test09Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.test09' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        Test09Model::Create($request->only(['ewf',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Test09Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Test09Model::findOrFail($id);
        $user->update($request->only(['ewf',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Test09Model::findOrFail($id);
        $user->delete();

    }
}
