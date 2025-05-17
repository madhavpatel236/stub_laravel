<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MnModel;


class MnController extends Controller
{
    public function index()
    {
         $users =MnModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.mn' );
    }

    public function store(Request $request)
    {
        MnModel::Create($request->only(['mn',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = MnModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = MnModel::findOrFail($id);
        $user->update($request->only(['mn',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = MnModel::findOrFail($id);
        $user->delete();

    }
}
