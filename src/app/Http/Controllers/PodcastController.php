<?php

namespace App\Http\Controllers;
use App\Jobs\ProcessPodcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    //
    public function store(Request $request)
    {
        // Create podcast...
        $podcast = "tranhuuthangcoi@gmail.com";
        ProcessPodcast::dispatch($podcast);
    }
}
