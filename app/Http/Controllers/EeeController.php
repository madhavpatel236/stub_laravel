<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EeeModel;


class EeeController extends Controller
{
    public function index()
    {
         $users =EeeModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.eee' );
    }

    public function store(Request $request)
    {
        EeeModel::Create($request->only(['dfc',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = EeeModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = EeeModel::findOrFail($id);
        $user->update($request->only(['dfc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = EeeModel::findOrFail($id);
        $user->delete();

    }
}
