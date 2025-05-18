<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dc3Model;


class Dc3Controller extends Controller
{
    public function index()
    {
        $users =Dc3Model::all();
        return view('Pages.Dc3', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Dc3Model::Create($request->only(['dc',]));
        return redirect()->route('Dc3Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Dc3Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Dc3Model::findOrFail($id);
        $user->update($request->only(['dc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Dc3Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Dc3Controller.index');


    }
}
