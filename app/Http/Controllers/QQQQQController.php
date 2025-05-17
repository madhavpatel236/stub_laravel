<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QQQQQModel;


class QQQQQController extends Controller
{
    public function index()
    {
        $users = QQQQQModel::all();
        return view('Pages.QQQQQ', compact('users'));
    }

    public function create() {}

    public function store(Request $request)
    {
        QQQQQModel::Create($request->only(['Q',]));
        return redirect()->route('QQQQQController.index');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = QQQQQModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = QQQQQModel::findOrFail($id);
        $user->update($request->only(['Q',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = QQQQQModel::findOrFail($id);
        $user->delete();
        return redirect()->route('QQQQQController.index');
    }
}
