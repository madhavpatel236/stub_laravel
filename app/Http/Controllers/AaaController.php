<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AaaModel;


class AaaController extends Controller
{
    public function index()
    {
         $users =AaaModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.aaa' );
    }

    public function store(Request $request)
    {
        AaaModel::Create($request->only(['aaa',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = AaaModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = AaaModel::findOrFail($id);
        $user->update($request->only(['aaa',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = AaaModel::findOrFail($id);
        $user->delete();

    }
}
