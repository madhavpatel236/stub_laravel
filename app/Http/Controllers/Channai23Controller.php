<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai23Model;


class Channai23Controller extends Controller
{
    public function index()
    {
        $users = Channai23Model::all();
        return view('Pages.channai23', compact('users'));
    }

    public function create() {}

    public function store(Request $request)
    {
        Channai23Model::Create($request->only(['name', 'age',]));
        return redirect()->route('Channai23Controller.index');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = Channai23Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai23Model::findOrFail($id);
        $user->update($request->only(['name', 'age',]));
        return redirect()->route('Channai23Controller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai23Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Channai23Controller.index');
    }
}
