<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table_nameModel;


class Table_nameController extends Controller
{
    public function index()
    {
         $users =Table_nameModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.Table_name' );
    }

    public function store(Request $request)
    {
        Table_nameModel::Create($request->only(['dfc',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Table_nameModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Table_nameModel::findOrFail($id);
        $user->update($request->only(['dfc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Table_nameModel::findOrFail($id);
        $user->delete();

    }
}
