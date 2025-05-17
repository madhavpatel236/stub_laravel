<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZxcModel;


class ZxcController extends Controller
{
    public function index()
    {
         $users =ZxcModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.zxc' );
    }

    public function store(Request $request)
    {
        ZxcModel::Create($request->only(['zxc',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = ZxcModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = ZxcModel::findOrFail($id);
        $user->update($request->only(['zxc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = ZxcModel::findOrFail($id);
        $user->delete();

    }
}
