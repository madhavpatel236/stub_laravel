<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TtModel;


class TtController extends Controller
{
    public function index()
    {
         $users =TtModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.tt' );
    }

    public function store(Request $request)
    {
        TtModel::Create($request->only(['22','ff',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = TtModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = TtModel::findOrFail($id);
        $user->update($request->only(['22','ff',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = TtModel::findOrFail($id);
        $user->delete();

    }
}
