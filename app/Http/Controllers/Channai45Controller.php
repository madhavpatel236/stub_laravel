<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai45Model;


class Channai45Controller extends Controller
{
    public function index()
    {
        $users =Channai45Model::all();
        return view('Pages.channai45', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Channai45Model::Create($request->only(['name',]));
        return redirect()->route('Channai45Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Channai45Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai45Model::findOrFail($id);
        $user->update($request->only(['name',]));
        return redirect()->route('Channai45Controller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai45Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Channai45Controller.index');


    }
}
