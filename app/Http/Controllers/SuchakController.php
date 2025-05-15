<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\SuchakModel;


class SuchakController extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =SuchakModel::all();
         return view('Pages.Suchak', compact('users'));
    }

    public function create()
    {
        return view('Create.Suchak' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        SuchakModel::Create($request->only(['q','w',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = SuchakModel::findOrFail($id);
        return view('Edit.Suchak',  compact('user'));
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
        $user = SuchakModel::findOrFail($id);
        $user->update($request->only(['q','w',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = SuchakModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
