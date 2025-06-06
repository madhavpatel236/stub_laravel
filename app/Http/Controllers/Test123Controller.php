<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test123Model;


class Test123Controller extends Controller
{
    public function index()
    {
        // var_dump('index'); exit;
        $users = Test123Model::all();
        return $users;
        //  return view('Pages.test123', compact('users'));
    }

    public function create()
    {
        return view('Create.test123');
    }

    public function store(Request $request)
    {
        var_dump('store');
        exit;
        Test123Model::Create($request->only(['qwer', 'qwertyui',]));
        return redirect('$url$');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = Test123Model::findOrFail($id);
        return view('Edit.test123',  compact('user'));
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
        $user = Test123Model::findOrFail($id);
        $user->update($request->only(['qwer', 'qwertyui',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Test123Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');
    }
}
