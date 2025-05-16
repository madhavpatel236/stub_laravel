<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo1223Model;


class Demo1223Controller extends Controller
{
    public function index()
    {
         $users =Demo1223Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.Demo1223' );
    }

    public function store(Request $request)
    {
        Demo1223Model::Create($request->only(['dfc',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Demo1223Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Demo1223Model::findOrFail($id);
        $user->update($request->only(['dfc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Demo1223Model::findOrFail($id);
        $user->delete();

    }
}
