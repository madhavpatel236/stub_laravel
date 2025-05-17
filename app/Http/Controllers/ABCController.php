<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ABCModel;


class ABCController extends Controller
{
    public function index()
    {
        $users = ABCModel::all();
        // var_dump($users);
        return view('Pages.ABC', compact('users'));
        // return response()->json($users);
    }

    public function create() {}

    public function store(Request $request)
    {
        ABCModel::Create($request->only(['Name',]));
        return redirect()->route('ABCController.index');
    }

    public function show(string $id)
    {
        $users = ABCModel::all();
        return response()->json($users);
    }

    public function edit(string $id)
    {
        $user = ABCModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = ABCModel::findOrFail($id);
        $user->update($request->only(['Name',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = ABCModel::findOrFail($id);
        $user->delete();
        return redirect()->route('ABCController.index');
//
    }
}
