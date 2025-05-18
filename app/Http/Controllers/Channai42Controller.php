<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai42Model;


class Channai42Controller extends Controller
{
    public function index()
    {
        $users =Channai42Model::all();
        return view('Pages.channai42', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Channai42Model::Create($request->only(['age',]));
        return redirect()->route('Channai42Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Channai42Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai42Model::findOrFail($id);
        $user->update($request->only(['age',]));
        return redirect()->route('Channai42Controller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai42Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Channai42Controller.index');


    }
}
