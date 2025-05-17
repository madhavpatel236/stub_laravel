<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsdfghModel;


class AsdfghController extends Controller
{
    public function index()
    {
         $users =AsdfghModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.asdfgh' );
    }

    public function store(Request $request)
    {
        AsdfghModel::Create($request->only(['asdf',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = AsdfghModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = AsdfghModel::findOrFail($id);
        $user->update($request->only(['asdf',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = AsdfghModel::findOrFail($id);
        $user->delete();

    }
}
