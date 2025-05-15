<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BBBModel;
use Illuminate\Support\Facades\DB;


class BBBController extends Controller
{
    public function index()
    {
        var_dump(DB::connection()->getDatabaseName());
        var_dump("users");
        $users = BBBModel::all();
        // dump(isset($users));
        // exit;
        return $users;
        //  return view('Pages.BBB', compact('users'));
    }

    public function create()
    {
        // return view('Create.BBB');
    }


    public function store(Request $request)
    {
        var_dump('store');
        exit;
        BBBModel::Create($request->only(['BBB',]));
        return redirect('$url$');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $user = BBBModel::findOrFail($id);
        // return view('Edit.BBB',  compact('user'));
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
        $user = BBBModel::findOrFail($id);
        $user->update($request->only(['BBB',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = BBBModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');
    }
}
