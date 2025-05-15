<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\patel1Model;


class Patel1Controller extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =patel1Model::all();
         return view('Pages.patel1', compact('users'));
    }

    public function create()
    {
        return view('Create.patel1' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        patel1Model::Create($request->only(['q',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = patel1Model::findOrFail($id);
        return view('Edit.patel1',  compact('user'));
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
        $user = patel1Model::findOrFail($id);
        $user->update($request->only(['q',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = patel1Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
