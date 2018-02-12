<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Services\VideoService;

class UploadController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->videoService = new VideoService;
    }

    /**
     * Show the video upload section.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('video.index');
    }

    /**
     * Post upload action action
     *
     * @return \Illuminate\Http\Redirect
     */
    public function postIndex(Request $request){

    	$validator = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'video' => 'required|mimetypes:video/mp4,video/x-m4v|max:20000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }

        $file = $request->file('video');
        $destinationPath = 'assets/uploads';

        $newFileName = mt_rand().'_'.$file->getClientOriginalName();
        $fileSize = $file->getClientSize();
	    if($file->move( $destinationPath,$newFileName )){
            $fullPath = $destinationPath.'/'.$newFileName;
            if($video = $this->videoService->extractAndSave($fullPath, $request->title, $fileSize)){
                return redirect('video/'.$video->slug.'/'.$video->id);
            }
        }

	}
	    
}
