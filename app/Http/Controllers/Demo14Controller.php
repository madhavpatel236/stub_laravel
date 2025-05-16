<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo14Model;


class Demo14Controller extends Controller
{
    public function index()
    {
         $users =Demo14Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.demo14' );
    }

    public function store(Request $request)
    {
        Demo14Model::Create($request->only(['demo',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Demo14Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Demo14Model::findOrFail($id);
        $user->update($request->only(['demo',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Demo14Model::findOrFail($id);
        $user->delete();

    }
}
