<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VModel;


class VController extends Controller
{
    public function index()
    {
        $users =VModel::all();
        return view('Pages.v', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        VModel::Create($request->only(['v','vv',]));
        return redirect()->route('VController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = VModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = VModel::findOrFail($id);
        $user->update($request->only(['v','vv',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = VModel::findOrFail($id);
        $user->delete();
        return redirect()->route('VController.index');


    }
}
