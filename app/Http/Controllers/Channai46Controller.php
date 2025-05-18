<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai46Model;


class Channai46Controller extends Controller
{
    public function index()
    {
        $users =Channai46Model::all();
        return view('Pages.channai46', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Channai46Model::Create($request->only(['age',]));
        return redirect()->route('Channai46Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Channai46Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai46Model::findOrFail($id);
        $user->update($request->only(['age',]));
        return redirect()->route('Channai46Controller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai46Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Channai46Controller.index');


    }
}
