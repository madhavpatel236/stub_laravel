<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test11Model;


class Test11Controller extends Controller
{
    public function index()
    {
         $users =Test11Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.test11' );
    }

    public function store(Request $request)
    {
        Test11Model::Create($request->only(['test',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Test11Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Test11Model::findOrFail($id);
        $user->update($request->only(['test',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Test11Model::findOrFail($id);
        $user->delete();

    }
}
