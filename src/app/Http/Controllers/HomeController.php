<?php

namespace App\Http\Controllers;
use  Auth;
use Carbon\Carbon;
use Cache;
use Illuminate\Http\Request;
use  App\Events\UserloginEvent;
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
    //    echo Auth::user()->name;
  
        if(Auth::check())
        {
            $expiresAt = Carbon::now()->addMinutes(2);
       
            Cache::put('user-is-online'. Auth::user()->id,true,$expiresAt);
        }
  
     
        return view('home')->with(Auth::user()->name);
    }
    public function event()
    {
        event(new UserloginEvent(Auth::user()));
        // dd(  event( new UserloginEvent()));
    }
}
