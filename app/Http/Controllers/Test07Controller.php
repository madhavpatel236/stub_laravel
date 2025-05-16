<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test07Model;


class Test07Controller extends Controller
{
    public function index()
    {
         $users =Test07Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.test07' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        Test07Model::Create($request->only(['test02',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Test07Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Test07Model::findOrFail($id);
        $user->update($request->only(['test02',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Test07Model::findOrFail($id);
        $user->delete();

    }
}
