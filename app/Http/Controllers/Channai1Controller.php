<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai1Model;


class Channai1Controller extends Controller
{
    public function index()
    {
        $users = Channai1Model::all();
        return view('Pages.channai1', compact('users'));
    }

    public function create() {}

    public function store(Request $request)
    {
        Channai1Model::Create($request->only(['name',]));
        return redirect()->route('Channai1Controller.index');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = Channai1Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai1Model::findOrFail($id);
        var_dump($user);
        $user->update($request->only(['name',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai1Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Channai1Controller.index');
    }
}
