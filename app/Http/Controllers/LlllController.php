<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LlllModel;


class LlllController extends Controller
{
    public function index()
    {
         $users =LlllModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.llll' );
    }

    public function store(Request $request)
    {
        LlllModel::Create($request->only(['llll',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = LlllModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = LlllModel::findOrFail($id);
        $user->update($request->only(['llll',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = LlllModel::findOrFail($id);
        $user->delete();

    }
}
