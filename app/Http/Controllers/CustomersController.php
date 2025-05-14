<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\customersModel;


class CustomersController extends Controller
{
    public function index()
    {
        var_dump('index'); exit;
         $users =customersModel::all();
         return view('Pages.customers', compact('users'));
    }

    public function create()
    {
        return view('Create.customers' );
    }

    public function store(Request $request)
    {
        var_dump('store'); exit;
        customersModel::Create($request->only(['name',]));
        return redirect('$url$');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = customersModel::findOrFail($id);
        return view('Edit.customers',  compact('user'));
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
        $user = customersModel::findOrFail($id);
        $user->update($request->only(['name',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = customersModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
