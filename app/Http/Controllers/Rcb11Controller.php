<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rcb11Model;


class Rcb11Controller extends Controller
{
    public function index()
    {
        $users = Rcb11Model::all();
        return view('Pages.rcb11', compact('users'));
    }

    public function create() {}

    public function store(Request $request)
    {
        Rcb11Model::Create($request->only(['a', 'b',]));
        return redirect()->route('Rcb11Controller.index');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = Rcb11Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Rcb11Model::findOrFail($id);
        $user->update($request->only(['a', 'b',]));
        return redirect()->route('Rcb11Controller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Rcb11Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Rcb11Controller.index');
    }
}
