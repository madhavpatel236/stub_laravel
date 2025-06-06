<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\aModel;


class AController extends Controller
{
    public function index()
    {
        dump('index'); exit;
         $users =aModel::all();
         return $users;
        //  return view('Pages.a', compact('users'));
    }

    public function create()
    {
        // return view('Create.a' );
    }

    public function store(Request $request)
    {
        dump('store'); exit;
        aModel::Create($request->only(['a','aa','aaa',]));
        // return redirect('/Home');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = aModel::findOrFail($id);
        // return view('Edit.a',  compact('user'));
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
        $user = aModel::findOrFail($id);
        $user->update($request->only(['a','aa','aaa',]));
        return redirect('$updateURL$');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = aModel::findOrFail($id);
        $user->delete();
        return redirect('$deleteURL$');

    }
}
