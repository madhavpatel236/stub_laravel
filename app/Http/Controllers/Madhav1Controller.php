<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\madhav1Model;


class Madhav1Controller extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =madhav1Model::all();
         return view('Pages.madhav1', compact('users'));
    }

    public function create()
    {
        return view('Create.madhav1' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        madhav1Model::Create($request->only(['maadhav',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = madhav1Model::findOrFail($id);
        return view('Edit.madhav1',  compact('user'));
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
        $user = madhav1Model::findOrFail($id);
        $user->update($request->only(['maadhav',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = madhav1Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
