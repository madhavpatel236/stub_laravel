<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IiiiiModel;


class IiiiiController extends Controller
{
    public function index()
    {
        $users =IiiiiModel::all();
        return view('Pages.iiiii', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        IiiiiModel::Create($request->only(['i','ii','iii',]));
        return redirect()->route('IiiiiController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = IiiiiModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = IiiiiModel::findOrFail($id);
        $user->update($request->only(['i','ii','iii',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = IiiiiModel::findOrFail($id);
        $user->delete();
        return redirect()->route('IiiiiController.index');


    }
}
