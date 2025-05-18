<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai15Model;


class Channai15Controller extends Controller
{
    public function index()
    {
        $users =Channai15Model::all();
        return view('Pages.channai15', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Channai15Model::Create($request->only(['name',]));
        return redirect()->route('Channai15Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Channai15Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai15Model::findOrFail($id);
        $user->update($request->only(['name',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai15Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Channai15Controller.index');


    }
}
