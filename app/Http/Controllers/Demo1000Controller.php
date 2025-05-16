<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo1000Model;


class Demo1000Controller extends Controller
{
    public function index()
    {
         $users =Demo1000Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.Demo1000' );
    }

    public function store(Request $request)
    {
        Demo1000Model::Create($request->only(['dfc',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Demo1000Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Demo1000Model::findOrFail($id);
        $user->update($request->only(['dfc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Demo1000Model::findOrFail($id);
        $user->delete();

    }
}
