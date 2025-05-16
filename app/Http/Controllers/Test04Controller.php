<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test04Model;


class Test04Controller extends Controller
{
    public function index()
    {
         $users =Test04Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.test04' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        Test04Model::Create($request->only(['test02',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Test04Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Test04Model::findOrFail($id);
        $user->update($request->only(['test02',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Test04Model::findOrFail($id);
        $user->delete();

    }
}
