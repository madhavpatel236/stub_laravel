<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PakModel;


class PakController extends Controller
{
    public function index()
    {
        $users =PakModel::all();
        return view('Pages.pak', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        PakModel::Create($request->only(['a',]));
        return redirect()->route('PakController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = PakModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = PakModel::findOrFail($id);
        $user->update($request->only(['a',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = PakModel::findOrFail($id);
        $user->delete();
        return redirect()->route('PakController.index');


    }
}
