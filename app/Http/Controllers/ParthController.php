<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\parthModel;


class ParthController extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =parthModel::all();
         return view('Pages.parth', compact('users'));
    }

    public function create()
    {
        return view('Create.parth' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        parthModel::Create($request->only(['a',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = parthModel::findOrFail($id);
        return view('Edit.parth',  compact('user'));
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
        $user = parthModel::findOrFail($id);
        $user->update($request->only(['a',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = parthModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
