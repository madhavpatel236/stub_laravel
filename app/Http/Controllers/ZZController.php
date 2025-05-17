<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZZModel;


class ZZController extends Controller
{
    public function index()
    {
        $users =ZZModel::all();
        return view('Pages.ZZ', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        ZZModel::Create($request->only(['ZZ',]));
        return redirect()->route('ZZController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = ZZModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = ZZModel::findOrFail($id);
        $user->update($request->only(['ZZ',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = ZZModel::findOrFail($id);
        $user->delete();
        return redirect()->route('ZZController.index');


    }
}
