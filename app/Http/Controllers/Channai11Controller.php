<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai11Model;


class Channai11Controller extends Controller
{
    public function index()
    {
        $users =Channai11Model::all();
        return view('Pages.channai11', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Channai11Model::Create($request->only(['age',]));
        return redirect()->route('Channai11Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Channai11Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai11Model::findOrFail($id);
        $user->update($request->only(['age',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai11Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Channai11Controller.index');


    }
}
