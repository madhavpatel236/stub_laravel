<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\maan2Model;


class Maan2Controller extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =maan2Model::all();
         return view('Pages.maan2', compact('users'));
    }

    public function create()
    {
        return view('Create.maan2' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        maan2Model::Create($request->only(['qwe']));
        return redirect('maan2controller');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = maan2Model::findOrFail($id);
        return view('Edit.maan2',  compact('user'));
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
        $user = maan2Model::findOrFail($id);
        $user->update($request->only(['qwe']));
        return redirect('maan2controller');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = maan2Model::findOrFail($id);
        $user->delete();
        return redirect('maan2controller');

    }
}
