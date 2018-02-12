<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VideoDataService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->videoDataService = new VideoDataService;
    }

    /**
     * Show latest videos with pagination
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = $this->videoDataService->getVideos();
        return view('home',['videos' => $videos]);
    }

    /**
     * Show video
     *
     * @return \Illuminate\Http\Response
     */

    public function video($slug, $id){
        $video = $this->videoDataService->getVideo( $id, $slug );
        if($video){
            return view('video',['video' => $video]);
        }
        
    }
}
