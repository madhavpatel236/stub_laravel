<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo12Model;


class Demo12Controller extends Controller
{
    public function index()
    {
         $users =Demo12Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.demo12' );
    }

    public function store(Request $request)
    {
        var_dump($request->all()); exit;
        Demo12Model::Create($request->only(['demo123',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Demo12Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Demo12Model::findOrFail($id);
        $user->update($request->only(['demo123',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Demo12Model::findOrFail($id);
        $user->delete();

    }
}
