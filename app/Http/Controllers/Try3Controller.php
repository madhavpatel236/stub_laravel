<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\try3Model;


class Try3Controller extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =try3Model::all();
         return view('Pages.try3', compact('users'));
    }

    public function create()
    {
        return view('Create.try3' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        try3Model::Create($request->only(['try',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = try3Model::findOrFail($id);
        return view('Edit.try3',  compact('user'));
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
        $user = try3Model::findOrFail($id);
        $user->update($request->only(['try',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = try3Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
