<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\AAModel;


class AAController extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =AAModel::all();
         return view('Pages.AA', compact('users'));
    }

    public function create()
    {
        return view('Create.AA' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        AAModel::Create($request->only(['AA',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = AAModel::findOrFail($id);
        return view('Edit.AA',  compact('user'));
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
        $user = AAModel::findOrFail($id);
        $user->update($request->only(['AA',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = AAModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
