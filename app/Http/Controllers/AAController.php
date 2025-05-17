<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AAModel;


class AAController extends Controller
{
    public function index()
    {
         $users =AAModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.AA' );
    }

    public function store(Request $request)
    {
        AAModel::Create($request->only(['AA',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = AAModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = AAModel::findOrFail($id);
        $user->update($request->only(['AA',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = AAModel::findOrFail($id);
        $user->delete();

    }
}
