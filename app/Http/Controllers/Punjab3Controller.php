<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Punjab3Model;


class Punjab3Controller extends Controller
{
    public function index()
    {
        $users =Punjab3Model::all();
        return view('Pages.punjab3', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Punjab3Model::Create($request->only(['a',]));
        return redirect()->route('Punjab3Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Punjab3Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Punjab3Model::findOrFail($id);
        $user->update($request->only(['a',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Punjab3Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Punjab3Controller.index');


    }
}
