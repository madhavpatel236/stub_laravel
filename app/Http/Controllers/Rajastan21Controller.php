<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rajastan21Model;


class Rajastan21Controller extends Controller
{
    public function index()
    {
        $users =Rajastan21Model::all();
        return view('Pages.rajastan21', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Rajastan21Model::Create($request->only(['qw',]));
        return redirect()->route('Rajastan21Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Rajastan21Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Rajastan21Model::findOrFail($id);
        $user->update($request->only(['qw',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Rajastan21Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Rajastan21Controller.index');


    }
}
