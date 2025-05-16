<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo22Model;


class Demo22Controller extends Controller
{
    public function index()
    {
         $users =Demo22Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.demo22' );
    }

    public function store(Request $request)
    {
        Demo22Model::Create($request->only(['dfc',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Demo22Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Demo22Model::findOrFail($id);
        $user->update($request->only(['dfc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Demo22Model::findOrFail($id);
        $user->delete();

    }
}
