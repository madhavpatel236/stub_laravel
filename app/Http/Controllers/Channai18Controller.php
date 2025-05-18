<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai18Model;


class Channai18Controller extends Controller
{
    public function index()
    {
        $users =Channai18Model::all();
        return view('Pages.channai18', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Channai18Model::Create($request->only(['name','age',]));
        return redirect()->route('Channai18Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Channai18Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai18Model::findOrFail($id);
        $user->update($request->only(['name','age',]));
        return redirect()->route('Channai18Controller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai18Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Channai18Controller.index');


    }
}
