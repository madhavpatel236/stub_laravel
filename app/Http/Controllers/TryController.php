<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tryModel;


class TryController extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =tryModel::all();
         return view('Pages.try', compact('users'));
    }

    public function create()
    {
        return view('Create.try' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        tryModel::Create($request->only(['try',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = tryModel::findOrFail($id);
        return view('Edit.try',  compact('user'));
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
        $user = tryModel::findOrFail($id);
        $user->update($request->only(['try',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = tryModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
