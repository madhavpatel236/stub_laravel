<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TargetModel;


class TargetController extends Controller
{
    public function index()
    {
         $users =TargetModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.Target' );
    }

    public function store(Request $request)
    {
        TargetModel::Create($request->only(['dfc',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = TargetModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = TargetModel::findOrFail($id);
        $user->update($request->only(['dfc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = TargetModel::findOrFail($id);
        $user->delete();

    }
}
