<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('student.index');
    }

    public function student()
    {
        return view('student.index');
    }

    public function apply()
    {
        return view('student.apply');
    }

    
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}
