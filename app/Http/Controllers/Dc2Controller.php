<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dc2Model;


class Dc2Controller extends Controller
{
    public function index()
    {
        $users =Dc2Model::all();
        return view('Pages.Dc2', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Dc2Model::Create($request->only(['dc',]));
        return redirect()->route('Dc2Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Dc2Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Dc2Model::findOrFail($id);
        $user->update($request->only(['dc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Dc2Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Dc2Controller.index');


    }
}
