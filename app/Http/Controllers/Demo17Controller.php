<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo17Model;


class Demo17Controller extends Controller
{
    public function index()
    {
         $users =Demo17Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.demo17' );
    }

    public function store(Request $request)
    {
        Demo17Model::Create($request->only(['dsvc',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Demo17Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Demo17Model::findOrFail($id);
        $user->update($request->only(['dsvc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Demo17Model::findOrFail($id);
        $user->delete();

    }
}
