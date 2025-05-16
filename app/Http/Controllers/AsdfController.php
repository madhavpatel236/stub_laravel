<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsdfModel;


class AsdfController extends Controller
{
    public function index()
    {
         $users =AsdfModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.Asdf' );
    }

    public function store(Request $request)
    {
        AsdfModel::Create($request->only(['dfc',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = AsdfModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = AsdfModel::findOrFail($id);
        $user->update($request->only(['dfc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = AsdfModel::findOrFail($id);
        $user->delete();

    }
}
