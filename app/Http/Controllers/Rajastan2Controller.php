<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rajastan2Model;


class Rajastan2Controller extends Controller
{
    public function index()
    {
        $users =Rajastan2Model::all();
        return view('Pages.rajastan2', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Rajastan2Model::Create($request->only(['123',]));
        return redirect()->route('Rajastan2Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Rajastan2Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Rajastan2Model::findOrFail($id);
        $user->update($request->only(['123',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Rajastan2Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Rajastan2Controller.index');


    }
}
