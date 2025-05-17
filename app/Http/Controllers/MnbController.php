<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MnbModel;


class MnbController extends Controller
{
    public function index()
    {
         $users =MnbModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.mnb' );
    }

    public function store(Request $request)
    {
        MnbModel::Create($request->only(['mnb',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = MnbModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = MnbModel::findOrFail($id);
        $user->update($request->only(['mnb',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = MnbModel::findOrFail($id);
        $user->delete();

    }
}
