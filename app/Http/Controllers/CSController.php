<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (auth()&& auth()->user()->level === 'admin') {
            $users = User::all();
            return view('user', compact('users'));

        }
        return redirect()->route('dashboard')->with('error','Bro You Are Not Him');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'level' => 'required',
        ]);

        User::create($user);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $user = $request->validate([
            'name' => 'string',
            'email' => 'email|unique:users,email,'.$id,
        ]);

        User::findOrFail($id)->update($user);
        return redirect()->route('user.index')->with('success', 'User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('user.index')->with('success', 'User delete successfully');
    }
}
