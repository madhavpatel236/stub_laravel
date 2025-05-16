<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maan_table10Model;


class Maan_table10Controller extends Controller
{
    public function index()
    {

        $users = Maan_table10Model::all();
        return $users;
        //  return view('Pages.maan_table10', compact('users'));
    }

    public function create()
    {
        return view('Create.maan_table10');
    }

    public function store(Request $request)
    {
        var_dump('store');
        exit;
        Maan_table10Model::Create($request->only(['col1',]));
        return redirect('$url$');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = Maan_table10Model::findOrFail($id);
        return view('Edit.maan_table10',  compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'lastName' => 'required'
        ]);
        $user = Maan_table10Model::findOrFail($id);
        $user->update($request->only(['col1',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Maan_table10Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');
    }
}
