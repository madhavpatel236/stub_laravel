<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\AAAModel;


class AAAController extends Controller
{
    public function index()
    {
        $users =AAAModel::all();
        var_dump($users); exit;
         return view('Pages.AAA', compact('users'));
    }

    public function create()
    {
        return view('Create.AAA' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        AAAModel::Create($request->only(['AAA',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = AAAModel::findOrFail($id);
        return view('Edit.AAA',  compact('user'));
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
        $user = AAAModel::findOrFail($id);
        $user->update($request->only(['AAA',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = AAAModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
