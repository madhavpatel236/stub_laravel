<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\AModel;


class AController extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =AModel::all();
         return view('Pages.A', compact('users'));
    }

    public function create()
    {
        return view('Create.A' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        AModel::Create($request->only(['A',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = AModel::findOrFail($id);
        return view('Edit.A',  compact('user'));
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
        $user = AModel::findOrFail($id);
        $user->update($request->only(['A',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = AModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
