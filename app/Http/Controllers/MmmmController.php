<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MmmmModel;


class MmmmController extends Controller
{
    public function index()
    {
         $users =MmmmModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.mmmm' );
    }

    public function store(Request $request)
    {
        MmmmModel::Create($request->only(['mmm',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = MmmmModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = MmmmModel::findOrFail($id);
        $user->update($request->only(['mmm',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = MmmmModel::findOrFail($id);
        $user->delete();

    }
}
