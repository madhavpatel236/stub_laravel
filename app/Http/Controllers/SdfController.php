<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SdfModel;


class SdfController extends Controller
{
    public function index()
    {
         $users =SdfModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.Sdf' );
    }

    public function store(Request $request)
    {
        SdfModel::Create($request->only(['dfc',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = SdfModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = SdfModel::findOrFail($id);
        $user->update($request->only(['dfc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = SdfModel::findOrFail($id);
        $user->delete();

    }
}
