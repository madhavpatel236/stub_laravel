<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QwertModel;


class QwertController extends Controller
{
    public function index()
    {
         $users =QwertModel::all();
        return response()->json($users);
    }

    public function create()
    {
        return view('Create.qwert' );
    }

    public function store(Request $request)
    {
        QwertModel::Create($request->only(['qwert',]));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = QwertModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = QwertModel::findOrFail($id);
        $user->update($request->only(['qwert',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = QwertModel::findOrFail($id);
        $user->delete();

    }
}
