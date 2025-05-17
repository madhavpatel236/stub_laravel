<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rr4Model;


class Rr4Controller extends Controller
{
    public function index()
    {
        $users =Rr4Model::all();
        return view('Pages.rr4', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Rr4Model::Create($request->only(['rr',]));
        return redirect()->route('Rr4Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Rr4Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Rr4Model::findOrFail($id);
        $user->update($request->only(['rr',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Rr4Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Rr4Controller.index');


    }
}
