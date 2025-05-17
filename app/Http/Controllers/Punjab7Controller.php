<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Punjab7Model;


class Punjab7Controller extends Controller
{
    public function index()
    {
        $users =Punjab7Model::all();
        return view('Pages.punjab7', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Punjab7Model::Create($request->only(['a',]));
        return redirect()->route('Punjab7Controller.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Punjab7Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Punjab7Model::findOrFail($id);
        $user->update($request->only(['a',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Punjab7Model::findOrFail($id);
        $user->delete();
        return redirect()->route('Punjab7Controller.index');


    }
}
