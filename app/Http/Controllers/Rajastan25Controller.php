<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rajastan25Model;


class Rajastan25Controller extends Controller
{
    public function index()
    {
        $users =Rajastan25Model::all();
        return view('Pages.rajastan25', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Rajastan25Model::Create($request->only(['rr',]));
        return redirect()->route('Rajastan25Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Rajastan25Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Rajastan25Model::findOrFail($id);
        $user->update($request->only(['rr',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Rajastan25Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Rajastan25Controller.index');


    }
}
