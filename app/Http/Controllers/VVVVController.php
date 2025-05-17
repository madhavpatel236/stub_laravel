<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VVVVModel;


class VVVVController extends Controller
{
    public function index()
    {
        $users =VVVVModel::all();
        return view('Pages.VVVV', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        VVVVModel::Create($request->only(['v','vv','vvv','vvvv',]));
        return redirect()->route('VVVVController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = VVVVModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = VVVVModel::findOrFail($id);
        $user->update($request->only(['v','vv','vvv','vvvv',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = VVVVModel::findOrFail($id);
        $user->delete();
        return redirect()->route('VVVVController.index');


    }
}
