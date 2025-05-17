<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IiiModel;


class IiiController extends Controller
{
    public function index()
    {
        $users =IiiModel::all();
        return view('Pages.iii', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        IiiModel::Create($request->only(['iii',]));
        return redirect()->route('IiiController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = IiiModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = IiiModel::findOrFail($id);
        $user->update($request->only(['iii',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = IiiModel::findOrFail($id);
        $user->delete();
        return redirect()->route('IiiController.index');


    }
}
