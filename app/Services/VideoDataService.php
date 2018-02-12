<?php 
namespace App\Services;

use App\Models\Video;


class VideoDataService
{
	/**
     * Create a new service instance.
     *
     * @return void
     */
	public function __construct()
    {
       $this->video = new Video;

    }
    /**
     * Get videos
     *
     * @return $video object
     */
	public function getVideos(){
		return $this->video->where('path', '!=', NULL)->orderBy('id','DESC')->paginate(15);
	}

	/**
     * Get videos
     *
     * @return $video object
     */
	public function getVideo($id, $slug){
		return $this->video->where('id', $id)->where('slug',$slug)->first();
	}
}