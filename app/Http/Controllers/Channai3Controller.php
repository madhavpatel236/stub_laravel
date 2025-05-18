<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai3Model;


class Channai3Controller extends Controller
{
    public function index()
    {
        $users =Channai3Model::all();
        return view('Pages.channai3', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Channai3Model::Create($request->only(['name','age',]));
        return redirect()->route('Channai3Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Channai3Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai3Model::findOrFail($id);
        $user->update($request->only(['name','age',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai3Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Channai3Controller.index');


    }
}
