<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZzModel;


class ZzController extends Controller
{
    public function index()
    {
        $users =ZzModel::all();
        return view('Pages.zz', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        ZzModel::Create($request->only(['ZZ','z',]));
        return redirect()->route('ZzController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = ZzModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = ZzModel::findOrFail($id);
        $user->update($request->only(['ZZ','z',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = ZzModel::findOrFail($id);
        $user->delete();
        return redirect()->route('ZzController.index');


    }
}
