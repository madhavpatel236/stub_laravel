<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PunjabModel;


class PunjabController extends Controller
{
    public function index()
    {
        $users =PunjabModel::all();
        return view('Pages.punjab', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        PunjabModel::Create($request->only(['a','b','c',]));
        return redirect()->route('PunjabController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = PunjabModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = PunjabModel::findOrFail($id);
        $user->update($request->only(['a','b','c',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = PunjabModel::findOrFail($id);
        $user->delete();
        return redirect()->route('PunjabController.index');


    }
}
