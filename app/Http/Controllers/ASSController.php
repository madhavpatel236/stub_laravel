<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ASSModel;


class ASSController extends Controller
{
    public function index()
    {
        $users =ASSModel::all();
        return view('Pages.ASS', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        ASSModel::Create($request->only(['ASS',]));
        return redirect()->route('ASSController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = ASSModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = ASSModel::findOrFail($id);
        $user->update($request->only(['ASS',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = ASSModel::findOrFail($id);
        $user->delete();
        return redirect()->route('ASSController.index');


    }
}
