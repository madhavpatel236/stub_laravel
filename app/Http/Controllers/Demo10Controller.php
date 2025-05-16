<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo10Model;


class Demo10Controller extends Controller
{
    public function index()
    {
         $users =Demo10Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.demo10' );
    }

    public function store(Request $request)
    {
        Demo10Model::Create($request->only(['demo',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Demo10Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Demo10Model::findOrFail($id);
        $user->update($request->only(['demo',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Demo10Model::findOrFail($id);
        $user->delete();

    }
}
