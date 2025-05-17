<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SModel;


class SController extends Controller
{
    public function index()
    {
        $users =SModel::all();
        return view('Pages.S', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        SModel::Create($request->only(['S',]));
        return redirect()->route('SController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = SModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = SModel::findOrFail($id);
        $user->update($request->only(['S',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = SModel::findOrFail($id);
        $user->delete();
        return redirect()->route('SController.index');


    }
}
