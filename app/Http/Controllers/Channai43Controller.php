<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai43Model;


class Channai43Controller extends Controller
{
    public function index()
    {
        $users =Channai43Model::all();
        return view('Pages.channai43', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Channai43Model::Create($request->only(['age',]));
        return redirect()->route('Channai43Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Channai43Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai43Model::findOrFail($id);
        $user->update($request->only(['age',]));
        return redirect()->route('Channai43Controller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai43Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Channai43Controller.index');


    }
}
