<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\cModel;


class CController extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =cModel::all();
         return view('Pages.c', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        CModel::Create($request->only(['c',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = CModel::findOrFail($id);
        return view('Edit.c',  compact('user'));
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
        $user = CModel::findOrFail($id);
        $user->update($request->only(['c',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = CModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
