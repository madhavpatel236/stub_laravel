<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZxcvModel;


class ZxcvController extends Controller
{
    public function index()
    {
         $users =ZxcvModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.zxcv' );
    }

    public function store(Request $request)
    {
        ZxcvModel::Create($request->only(['zxcv',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = ZxcvModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = ZxcvModel::findOrFail($id);
        $user->update($request->only(['zxcv',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = ZxcvModel::findOrFail($id);
        $user->delete();

    }
}
