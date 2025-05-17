<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SwqeModel;


class SwqeController extends Controller
{
    public function index()
    {
        $users =SwqeModel::all();
        return view('Pages.swqe', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        SwqeModel::Create($request->only(['a','aw','awer',]));
        return redirect()->route('SwqeController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = SwqeModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = SwqeModel::findOrFail($id);
        $user->update($request->only(['a','aw','awer',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = SwqeModel::findOrFail($id);
        $user->delete();
        return redirect()->route('SwqeController.index');


    }
}
