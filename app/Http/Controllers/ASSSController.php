<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ASSSModel;


class ASSSController extends Controller
{
    public function index()
    {
        $users =ASSSModel::all();
        return view('Pages.ASSS', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        ASSSModel::Create($request->only(['ASS',]));
        return redirect()->route('ASSSController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = ASSSModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = ASSSModel::findOrFail($id);
        $user->update($request->only(['ASS',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = ASSSModel::findOrFail($id);
        $user->delete();
        return redirect()->route('ASSSController.index');


    }
}
