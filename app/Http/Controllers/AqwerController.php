<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AqwerModel;


class AqwerController extends Controller
{
    public function index()
    {
        $users =AqwerModel::all();
        return view('Pages.aqwer', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        AqwerModel::Create($request->only(['a','aa','aaa','aaaa',]));
        return redirect()->route('AqwerController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = AqwerModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = AqwerModel::findOrFail($id);
        $user->update($request->only(['a','aa','aaa','aaaa',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = AqwerModel::findOrFail($id);
        $user->delete();
        return redirect()->route('AqwerController.index');


    }
}
