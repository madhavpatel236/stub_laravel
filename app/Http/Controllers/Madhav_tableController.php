<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\madhav_tableModel;


class Madhav_tableController extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =madhav_tableModel::all();
         return view('Pages.madhav_table', compact('users'));
    }

    public function create()
    {
        return view('Create.madhav_table' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        madhav_tableModel::Create($request->only(['patel',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = madhav_tableModel::findOrFail($id);
        return view('Edit.madhav_table',  compact('user'));
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
        $user = madhav_tableModel::findOrFail($id);
        $user->update($request->only(['patel',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = madhav_tableModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
