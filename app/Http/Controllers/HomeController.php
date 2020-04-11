<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $data = DB::table('users')
            ->join('users_details', 'users.id', '=', 'users_details.user_id')
            ->where('users.id', Auth::user()->id)
            ->get();
        // var_dump($user);
        return view('profile', compact('data'));
    }

    public function apidoc()
    {
        return view('apidoc');
    }
}
