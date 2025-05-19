<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rcb10Model;


class Rcb10Controller extends Controller
{
    public function index()
    {
        $users =Rcb10Model::all();
        return view('Pages.rcb10', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Rcb10Model::Create($request->only(['qwe',]));
        return redirect()->route('Rcb10Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Rcb10Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Rcb10Model::findOrFail($id);
        $user->update($request->only(['qwe',]));
        return redirect()->route('Rcb10Controller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Rcb10Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Rcb10Controller.index');


    }
}
