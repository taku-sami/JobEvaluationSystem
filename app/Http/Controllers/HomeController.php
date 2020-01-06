<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        if(Auth::user()->auth === "admin")
        {
            return redirect('/main');
        }elseif(Auth::user()->auth === "boss1")
        {
            return redirect('/boss');
        }elseif(Auth::user()->auth === "boss2")
        {
            return redirect('/boss');
        }else{
            return redirect('/staff');
        }
    }
}
