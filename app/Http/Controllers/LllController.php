<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LllModel;


class LllController extends Controller
{
    public function index()
    {
         $users =LllModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.lll' );
    }

    public function store(Request $request)
    {
        LllModel::Create($request->only(['lll',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = LllModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = LllModel::findOrFail($id);
        $user->update($request->only(['lll',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = LllModel::findOrFail($id);
        $user->delete();

    }
}
