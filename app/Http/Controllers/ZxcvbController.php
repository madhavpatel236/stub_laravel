<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZxcvbModel;


class ZxcvbController extends Controller
{
    public function index()
    {
         $users =ZxcvbModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.zxcvb' );
    }

    public function store(Request $request)
    {
        ZxcvbModel::Create($request->only(['zxcvb',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = ZxcvbModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = ZxcvbModel::findOrFail($id);
        $user->update($request->only(['zxcvb',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = ZxcvbModel::findOrFail($id);
        $user->delete();

    }
}
