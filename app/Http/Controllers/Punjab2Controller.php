<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Punjab2Model;


class Punjab2Controller extends Controller
{
    public function index()
    {
        $users =Punjab2Model::all();
        return view('Pages.punjab2', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Punjab2Model::Create($request->only(['a',]));
        return redirect()->route('Punjab2Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Punjab2Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Punjab2Model::findOrFail($id);
        $user->update($request->only(['a',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Punjab2Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Punjab2Controller.index');


    }
}
