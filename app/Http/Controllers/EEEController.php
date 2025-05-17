<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EEEModel;


class EEEController extends Controller
{
    public function index()
    {
        $users =EEEModel::all();
        return view('Pages.EEE', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        EEEModel::Create($request->only(['E',]));
        return redirect()->route('EEEController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = EEEModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = EEEModel::findOrFail($id);
        $user->update($request->only(['E',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = EEEModel::findOrFail($id);
        $user->delete();
        return redirect()->route('EEEController.index');


    }
}
