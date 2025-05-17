<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IiModel;


class IiController extends Controller
{
    public function index()
    {
        $users =IiModel::all();
        return view('Pages.ii', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        IiModel::Create($request->only(['ii','i',]));
        return redirect()->route('IiController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = IiModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = IiModel::findOrFail($id);
        $user->update($request->only(['ii','i',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = IiModel::findOrFail($id);
        $user->delete();
        return redirect()->route('IiController.index');


    }
}
