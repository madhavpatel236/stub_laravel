<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\patelModel;


class PatelController extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =patelModel::all();
         return view('Pages.patel', compact('users'));
    }

    public function create()
    {
        return view('Create.patel' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        patelModel::Create($request->only(['q',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = patelModel::findOrFail($id);
        return view('Edit.patel',  compact('user'));
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
        $user = patelModel::findOrFail($id);
        $user->update($request->only(['q',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = patelModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
