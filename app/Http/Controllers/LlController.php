<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LlModel;


class LlController extends Controller
{
    public function index()
    {
         $users =LlModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.ll' );
    }

    public function store(Request $request)
    {
        LlModel::Create($request->only(['ll',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = LlModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = LlModel::findOrFail($id);
        $user->update($request->only(['ll',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = LlModel::findOrFail($id);
        $user->delete();

    }
}
