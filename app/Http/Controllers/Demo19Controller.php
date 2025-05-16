<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo19Model;


class Demo19Controller extends Controller
{
    public function index()
    {
         $users =Demo19Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.demo19' );
    }

    public function store(Request $request)
    {
        Demo19Model::Create($request->only(['dfc',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Demo19Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Demo19Model::findOrFail($id);
        $user->update($request->only(['dfc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Demo19Model::findOrFail($id);
        $user->delete();

    }
}
