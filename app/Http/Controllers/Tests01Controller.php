<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tests01Model;


class Tests01Controller extends Controller
{
    public function index()
    {
         $users =Tests01Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.tests01' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        Tests01Model::Create($request->only(['aa',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Tests01Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Tests01Model::findOrFail($id);
        $user->update($request->only(['aa',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Tests01Model::findOrFail($id);
        $user->delete();

    }
}
