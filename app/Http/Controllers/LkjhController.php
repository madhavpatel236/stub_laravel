<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LkjhModel;


class LkjhController extends Controller
{
    public function index()
    {
        $users =LkjhModel::all();
        return view('Pages.lkjh', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        LkjhModel::Create($request->only(['lkjh',]));
        return redirect()->route('LkjhController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = LkjhModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = LkjhModel::findOrFail($id);
        $user->update($request->only(['lkjh',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = LkjhModel::findOrFail($id);
        $user->delete();
        return redirect()->route('LkjhController.index');


    }
}
