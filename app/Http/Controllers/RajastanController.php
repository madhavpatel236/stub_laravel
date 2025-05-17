<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RajastanModel;


class RajastanController extends Controller
{
    public function index()
    {
        $users =RajastanModel::all();
        return view('Pages.rajastan', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        RajastanModel::Create($request->only(['123',]));
        return redirect()->route('RajastanController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = RajastanModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = RajastanModel::findOrFail($id);
        $user->update($request->only(['123',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = RajastanModel::findOrFail($id);
        $user->delete();
        return redirect()->route('RajastanController.index');


    }
}
