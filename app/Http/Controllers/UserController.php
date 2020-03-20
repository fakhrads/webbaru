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

    public function userinfo(Request $request)
    {
        $user = Auth::user();
        // validasi file
        $this->validate(request(), [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = request('name');

        $user->save();

        return redirect()->back()->with('success', 'Your Profile Has Been Changed');
    }

    public function email(Request $request)
    {
        $user = Auth::user();

        $this->validate(request(), [
            'email' => 'required|email|unique:users',
        ]);

        $user->email = request('email');

        $user->save();

        return redirect()->back()->with('success', 'Your Profile Has Been Changed');
    }

    public function password(Request $request)
    {
        $user = Auth::user();

        $this->validate(request(), [
            'current_password' => $user->password,
            'new_password' => 'required|min:8',
            'new_confirm_password' => 'same:new_password',
        ]);

        $user->password = bcrypt(request('new_password'));

        $user->save();

        return redirect()->back()->with('success', 'Your Profile Has Been Changed');
    }

    public function apikey(Request $request)
    {
        $user = Auth::user();

        $this->validate(request(), [
            'current_apikey' => $user->apikey,
            'new_apikey' => 'required|min:10|max:10',
        ]);

        $user->apikey = request('new_apikey');

        $user->save();

        return redirect()->back()->with('success', 'Your Profile Has Been Changed');
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
