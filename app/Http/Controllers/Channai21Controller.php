<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai21Model;


class Channai21Controller extends Controller
{
    public function index()
    {
        $users =Channai21Model::all();
        return view('Pages.channai21', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Channai21Model::Create($request->only(['name','age',]));
        return redirect()->route('Channai21Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Channai21Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai21Model::findOrFail($id);
        $user->update($request->only(['name','age',]));
        return redirect()->route('Channai21Controller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai21Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Channai21Controller.index');


    }
}
