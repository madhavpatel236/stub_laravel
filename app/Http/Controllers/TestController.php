<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\testModel;


class TestController extends Controller
{
    public function index()
    {
        // var_dump('index'); exit;
        $users = testModel::all();
        return response()->json($users);
        //  return view('Pages.test', compact('users'));
    }

    public function create()
    {
        return view('Create.test');
    }

    public function store(Request $request)
    {
        var_dump('store');
        exit;
        testModel::Create($request->only(['wert']));
        return redirect('testcontroller');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = testModel::findOrFail($id);
        return view('Edit.test',  compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'lastName' => 'required'
        ]);
        $user = testModel::findOrFail($id);
        $user->update($request->only(['wert']));
        return redirect('testcontroller');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = testModel::findOrFail($id);
        $user->delete();
        return redirect('testcontroller');
    }
}
