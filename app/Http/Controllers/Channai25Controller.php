<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai25Model;


class Channai25Controller extends Controller
{
    public function index()
    {
        $users = Channai25Model::all();
        return view('Pages.channai25', compact('users'));
    }

    public function create() {}

    public function store(Request $request)
    {
        Channai25Model::Create($request->only(['name', 'age',]));
        return redirect()->route('Channai25Controller.index');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = Channai25Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai25Model::findOrFail($id);
        $user->update($request->only(['name', 'age',]));
        // return $this->index();
        // return redirect()->route('Channai25Controller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai25Model::findOrFail($id);
        $user->delete();
        // return $this->index();
        return redirect()->route('Channai25Controller.index');
    }
}
