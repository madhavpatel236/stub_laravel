<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai19Model;


class Channai19Controller extends Controller
{
    public function index()
    {
        $users =Channai19Model::all();
        return view('Pages.channai19', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Channai19Model::Create($request->only(['name',]));
        return redirect()->route('Channai19Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Channai19Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai19Model::findOrFail($id);
        $user->update($request->only(['name',]));
        return redirect()->route('Channai19Controller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai19Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Channai19Controller.index');


    }
}
