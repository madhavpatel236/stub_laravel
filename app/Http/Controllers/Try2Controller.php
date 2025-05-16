<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\try2Model;


class Try2Controller extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =try2Model::all();
         return view('Pages.try2', compact('users'));
    }

    public function create()
    {
        return view('Create.try2' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        try2Model::Create($request->only(['try',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = try2Model::findOrFail($id);
        return view('Edit.try2',  compact('user'));
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
        $user = try2Model::findOrFail($id);
        $user->update($request->only(['try',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = try2Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
