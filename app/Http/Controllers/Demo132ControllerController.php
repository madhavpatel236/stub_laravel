<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo132ControllerModel;


class Demo132ControllerController extends Controller
{
    public function index()
    {
         $users =Demo132ControllerModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.Demo132Controller' );
    }

    public function store(Request $request)
    {
        Demo132ControllerModel::Create($request->only(['qwe',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Demo132ControllerModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Demo132ControllerModel::findOrFail($id);
        $user->update($request->only(['qwe',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Demo132ControllerModel::findOrFail($id);
        $user->delete();

    }
}
