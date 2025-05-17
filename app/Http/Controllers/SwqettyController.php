<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SwqettyModel;


class SwqettyController extends Controller
{
    public function index()
    {
        $users =SwqettyModel::all();
        return view('Pages.swqetty', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        SwqettyModel::Create($request->only(['a',]));
        return redirect()->route('SwqettyController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = SwqettyModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = SwqettyModel::findOrFail($id);
        $user->update($request->only(['a',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = SwqettyModel::findOrFail($id);
        $user->delete();
        return redirect()->route('SwqettyController.index');


    }
}
