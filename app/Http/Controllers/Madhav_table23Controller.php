<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Madhav_table23Model;


class Madhav_table23Controller extends Controller
{
    public function index()
    {
         $users =Madhav_table23Model::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.madhav_table23' );
    }

    public function store(Request $request)
    {
        Madhav_table23Model::Create($request->only(['name',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = Madhav_table23Model::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Madhav_table23Model::findOrFail($id);
        $user->update($request->only(['name',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Madhav_table23Model::findOrFail($id);
        $user->delete();

    }
}
