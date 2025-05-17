<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TTModel;


class TTController extends Controller
{
    public function index()
    {
        $users =TTModel::all();
        return view('Pages.TT', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        TTModel::Create($request->only(['TT','TTT',]));
        return redirect()->route('TTController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = TTModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = TTModel::findOrFail($id);
        $user->update($request->only(['TT','TTT',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = TTModel::findOrFail($id);
        $user->delete();
        return redirect()->route('TTController.index');


    }
}
