<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TTTTModel;


class TTTTController extends Controller
{
    public function index()
    {
        $users =TTTTModel::all();
        return view('Pages.TTTT', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        TTTTModel::Create($request->only(['TTTT','T',]));
        return redirect()->route('TTTTController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = TTTTModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = TTTTModel::findOrFail($id);
        $user->update($request->only(['TTTT','T',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = TTTTModel::findOrFail($id);
        $user->delete();
        return redirect()->route('TTTTController.index');


    }
}
