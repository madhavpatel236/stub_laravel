<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsdfgModel;


class AsdfgController extends Controller
{
    public function index()
    {
         $users =AsdfgModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.asdfg' );
    }

    public function store(Request $request)
    {
        AsdfgModel::Create($request->only(['asdf',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = AsdfgModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = AsdfgModel::findOrFail($id);
        $user->update($request->only(['asdf',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = AsdfgModel::findOrFail($id);
        $user->delete();

    }
}
