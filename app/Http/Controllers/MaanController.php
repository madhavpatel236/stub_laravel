<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\maanModel;


class MaanController extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =maanModel::all();
         return view('Pages.maan', compact('users'));
    }

    public function create()
    {
        return view('Create.maan' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        maanModel::Create($request->only(['qwe',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = maanModel::findOrFail($id);
        return view('Edit.maan',  compact('user'));
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
        $user = maanModel::findOrFail($id);
        $user->update($request->only(['qwe',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = maanModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
