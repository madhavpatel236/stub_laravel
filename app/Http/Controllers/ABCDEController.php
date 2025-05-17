<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ABCDEModel;


class ABCDEController extends Controller
{
    public function index()
    {
        $users =ABCDEModel::all();
        return view('Pages.ABCDE', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        ABCDEModel::Create($request->only(['ABCDE',]));
        return redirect()->route('ABCDEController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = ABCDEModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = ABCDEModel::findOrFail($id);
        $user->update($request->only(['ABCDE',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = ABCDEModel::findOrFail($id);
        $user->delete();
        return redirect()->route('ABCDEController.index');


    }
}
