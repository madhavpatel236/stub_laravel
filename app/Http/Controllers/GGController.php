<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GGModel;


class GGController extends Controller
{
    public function index()
    {
        $users =GGModel::all();
        return view('Pages.GG', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        GGModel::Create($request->only(['G','GG','GGG',]));
        return redirect()->route('GGController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = GGModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = GGModel::findOrFail($id);
        $user->update($request->only(['G','GG','GGG',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = GGModel::findOrFail($id);
        $user->delete();
        return redirect()->route('GGController.index');


    }
}
