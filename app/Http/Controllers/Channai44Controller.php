<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channai44Model;


class Channai44Controller extends Controller
{
    public function index()
    {
        $users =Channai44Model::all();
        return view('Pages.channai44', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Channai44Model::Create($request->only(['name',]));
        return redirect()->route('Channai44Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Channai44Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Channai44Model::findOrFail($id);
        $user->update($request->only(['name',]));
        return redirect()->route('Channai44Controller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Channai44Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Channai44Controller.index');


    }
}
