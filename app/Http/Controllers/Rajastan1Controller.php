<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rajastan1Model;


class Rajastan1Controller extends Controller
{
    public function index()
    {
        $users =Rajastan1Model::all();
        return view('Pages.rajastan1', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Rajastan1Model::Create($request->only(['123',]));
        return redirect()->route('Rajastan1Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Rajastan1Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Rajastan1Model::findOrFail($id);
        $user->update($request->only(['123',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Rajastan1Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Rajastan1Controller.index');


    }
}
