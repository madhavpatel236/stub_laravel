<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QQQQModel;


class QQQQController extends Controller
{
    public function index()
    {
        $users =QQQQModel::all();
        return view('Pages.QQQQ', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        QQQQModel::Create($request->only(['Q',]));
        return redirect()->route('QQQQController.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = QQQQModel::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = QQQQModel::findOrFail($id);
        $user->update($request->only(['Q',]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = QQQQModel::findOrFail($id);
        $user->delete();
        return redirect()->route('QQQQController.index');


    }
}
