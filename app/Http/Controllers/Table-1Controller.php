<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table_1Model;


class Table_1Controller extends Controller
{
    public function index()
    {
         $users =Table_1Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.Table_1' );
    }

    public function store(Request $request)
    {
        Table_1Model::Create($request->only(['name','email',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Table_1Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Table_1Model::findOrFail($id);
        $user->update($request->only(['name','email',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Table_1Model::findOrFail($id);
        $user->delete();

    }
}
