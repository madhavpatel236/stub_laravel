<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rajastan24Model;


class Rajastan24Controller extends Controller
{
    public function index()
    {
        $users =Rajastan24Model::all();
        return view('Pages.rajastan24', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Rajastan24Model::Create($request->only(['rr',]));
        return redirect()->route('Rajastan24Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Rajastan24Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Rajastan24Model::findOrFail($id);
        $user->update($request->only(['rr',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Rajastan24Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Rajastan24Controller.index');


    }
}
