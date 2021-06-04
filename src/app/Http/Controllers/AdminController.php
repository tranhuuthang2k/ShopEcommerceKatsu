<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Auth;
use Carbon\Carbon;
use Cache;
class AdminController extends Controller
{
    //
    public function Home()
    {
    
        if(Auth::check())
        {
            $expiresAt = Carbon::now()->addMinutes(1);
       
            Cache::put('user-is-online'. Auth::user()->id,true,$expiresAt);
        }
        return view('home');
    
    }
}
