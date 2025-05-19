<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lsg1Model;


class Lsg1Controller extends Controller
{
    public function index()
    {
        $users =Lsg1Model::all();
        return view('Pages.lsg1', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Lsg1Model::Create($request->only(['name','team',]));
        return redirect()->route('Lsg1Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Lsg1Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Lsg1Model::findOrFail($id);
        $user->update($request->only(['name','team',]));
        return redirect()->route('Lsg1Controller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Lsg1Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Lsg1Controller.index');


    }
}
