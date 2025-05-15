<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\customer1Model;


class Customer1Controller extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =customer1Model::all();
         return view('Pages.customer1', compact('users'));
    }

    public function create()
    {
        return view('Create.customer1' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        customer1Model::Create($request->only(['id',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = customer1Model::findOrFail($id);
        return view('Edit.customer1',  compact('user'));
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
        $user = customer1Model::findOrFail($id);
        $user->update($request->only(['id',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = customer1Model::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
