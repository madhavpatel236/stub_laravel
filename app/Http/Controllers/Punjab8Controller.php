<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Punjab8Model;


class Punjab8Controller extends Controller
{
    public function index()
    {
        $users =Punjab8Model::all();
        return view('Pages.punjab8', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Punjab8Model::Create($request->only(['123',]));
        return redirect()->route('Punjab8Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Punjab8Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Punjab8Model::findOrFail($id);
        $user->update($request->only(['123',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Punjab8Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Punjab8Controller.index');


    }
}
