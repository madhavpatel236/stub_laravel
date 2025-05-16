<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TttModel;


class TttController extends Controller
{
    public function index()
    {
         $users =TttModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.ttt' );
    }

    public function store(Request $request)
    {
        TttModel::Create($request->only(['ttt',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = TttModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = TttModel::findOrFail($id);
        $user->update($request->only(['ttt',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = TttModel::findOrFail($id);
        $user->delete();

    }
}
