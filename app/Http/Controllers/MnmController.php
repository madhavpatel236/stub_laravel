<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MnmModel;


class MnmController extends Controller
{
    public function index()
    {
         $users =MnmModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.mnm' );
    }

    public function store(Request $request)
    {
        MnmModel::Create($request->only(['mnm',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = MnmModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = MnmModel::findOrFail($id);
        $user->update($request->only(['mnm',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = MnmModel::findOrFail($id);
        $user->delete();

    }
}
