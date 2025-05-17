<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rr20Model;


class Rr20Controller extends Controller
{
    public function index()
    {
        $users =Rr20Model::all();
        return view('Pages.rr20', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Rr20Model::Create($request->only(['WE',]));
        return redirect()->route('Rr20Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Rr20Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Rr20Model::findOrFail($id);
        $user->update($request->only(['WE',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Rr20Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Rr20Controller.index');


    }
}
