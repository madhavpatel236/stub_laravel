<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\BModel;


class BController extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =BModel::all();
         return view('Pages.B', compact('users'));
    }

    public function create()
    {
        return view('Create.B' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        BModel::Create($request->only(['B','BB',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = BModel::findOrFail($id);
        return view('Edit.B',  compact('user'));
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
        $user = BModel::findOrFail($id);
        $user->update($request->only(['B','BB',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = BModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
