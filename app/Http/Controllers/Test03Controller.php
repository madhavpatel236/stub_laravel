<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test03Model;


class Test03Controller extends Controller
{
    public function index()
    {
         $users =Test03Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.test03' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        Test03Model::Create($request->only(['test02',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Test03Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Test03Model::findOrFail($id);
        $user->update($request->only(['test02',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Test03Model::findOrFail($id);
        $user->delete();

    }
}
