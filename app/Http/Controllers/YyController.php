<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YyModel;


class YyController extends Controller
{
    public function index()
    {
        $users =YyModel::all();
        return view('Pages.yy', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        YyModel::Create($request->only(['y','yy',]));
        return redirect()->route('YyController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = YyModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = YyModel::findOrFail($id);
        $user->update($request->only(['y','yy',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = YyModel::findOrFail($id);
        $user->delete();
        return redirect()->route('YyController.index');


    }
}
