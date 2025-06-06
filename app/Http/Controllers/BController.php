<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\bModel;


class BController extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =bModel::all();
         return view('Pages.b', compact('users'));
    }

    public function create()
    {
        return view('Create.b' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        bModel::Create($request->only(['b',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = bModel::findOrFail($id);
        return view('Edit.b',  compact('user'));
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
        $user = bModel::findOrFail($id);
        $user->update($request->only(['b',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = bModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
