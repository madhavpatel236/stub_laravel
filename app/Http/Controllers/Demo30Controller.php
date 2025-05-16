<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo30Model;


class Demo30Controller extends Controller
{
    public function index()
    {
         $users =Demo30Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.Demo30' );
    }

    public function store(Request $request)
    {
        Demo30Model::Create($request->only(['dfc',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Demo30Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Demo30Model::findOrFail($id);
        $user->update($request->only(['dfc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Demo30Model::findOrFail($id);
        $user->delete();

    }
}
