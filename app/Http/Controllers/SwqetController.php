<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SwqetModel;


class SwqetController extends Controller
{
    public function index()
    {
        $users =SwqetModel::all();
        return view('Pages.swqet', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        SwqetModel::Create($request->only(['a','b','c',]));
        return redirect()->route('SwqetController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = SwqetModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = SwqetModel::findOrFail($id);
        $user->update($request->only(['a','b','c',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = SwqetModel::findOrFail($id);
        $user->delete();
        return redirect()->route('SwqetController.index');


    }
}
