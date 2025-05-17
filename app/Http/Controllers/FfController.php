<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FfModel;


class FfController extends Controller
{
    public function index()
    {
        $users =FfModel::all();
        return view('Pages.ff', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        FfModel::Create($request->only(['f','ff','fff',]));
        return redirect()->route('FfController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = FfModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = FfModel::findOrFail($id);
        $user->update($request->only(['f','ff','fff',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = FfModel::findOrFail($id);
        $user->delete();
        return redirect()->route('FfController.index');


    }
}
