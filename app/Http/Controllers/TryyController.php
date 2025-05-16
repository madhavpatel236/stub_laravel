<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TryyModel;


class TryyController extends Controller
{
    public function index()
    {
         $users =TryyModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.Tryy' );
    }

    public function store(Request $request)
    {
        TryyModel::Create($request->only(['dfc',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = TryyModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = TryyModel::findOrFail($id);
        $user->update($request->only(['dfc',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = TryyModel::findOrFail($id);
        $user->delete();

    }
}
