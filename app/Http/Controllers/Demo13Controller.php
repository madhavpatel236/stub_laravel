<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo13Model;


class Demo13Controller extends Controller
{
    public function index()
    {
         $users =Demo13Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.demo13' );
    }

    public function store(Request $request)
    {
        redirect('/Home');
        Demo13Model::Create($request->only(['test',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Demo13Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Demo13Model::findOrFail($id);
        $user->update($request->only(['test',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Demo13Model::findOrFail($id);
        $user->delete();

    }
}
