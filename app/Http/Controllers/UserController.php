<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function email(Request $request)
    {
        $user = Auth::user();

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $user->name = request('name');
        $user->email = request('email');

        $user->save();

        return redirect()->back()->with('success','Your Profile Has Been Changed');
    }

    public function update(User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        return back();
    }
}
