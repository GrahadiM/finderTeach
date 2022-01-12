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
        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin-dashboard.index');
        } 
        if (auth()->user()->role == 'teacher') {
            return redirect()->route('teacher-dashboard.index');
        }
        if (auth()->user()->role == 'student') {
            return redirect()->route('student-dashboard.index');
        }
        // return view('home');
    }
}
