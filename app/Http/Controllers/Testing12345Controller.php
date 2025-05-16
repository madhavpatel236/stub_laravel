<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testing12345Model;


class Testing12345Controller extends Controller
{
    public function index()
    {
         $users =Testing12345Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.testing12345' );
    }

    public function store(Request $request)
    {
        Testing12345Model::Create($request->only(['qwe',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Testing12345Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Testing12345Model::findOrFail($id);
        $user->update($request->only(['qwe',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Testing12345Model::findOrFail($id);
        $user->delete();

    }
}
