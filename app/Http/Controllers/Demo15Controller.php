<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo15Model;


class Demo15Controller extends Controller
{
    public function index()
    {
         $users =Demo15Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.demo15' );
    }

    public function store(Request $request)
    {
        Demo15Model::Create($request->only(['demo',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Demo15Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Demo15Model::findOrFail($id);
        $user->update($request->only(['demo',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Demo15Model::findOrFail($id);
        $user->delete();

    }
}
