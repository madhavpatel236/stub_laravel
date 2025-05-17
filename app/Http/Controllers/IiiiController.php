<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IiiiModel;


class IiiiController extends Controller
{
    public function index()
    {
        $users =IiiiModel::all();
        return view('Pages.iiii', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        IiiiModel::Create($request->only(['i','ii',]));
        return redirect()->route('IiiiController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = IiiiModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = IiiiModel::findOrFail($id);
        $user->update($request->only(['i','ii',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = IiiiModel::findOrFail($id);
        $user->delete();
        return redirect()->route('IiiiController.index');


    }
}
