<?php 
namespace App\Services;

use App\Models\Video;
use App\Helpers\AppHelper;
use FFmpegMovie;
use Auth;

class VideoService
{

	/**
    * Source path 
    * 
    * @var varchar
    */
	protected $path;

	/**
    * Title
    * 
    * @var varchar
    */
	protected $title;

	/**
    * Slug
    * 
    * @var varchar
    */
	protected $slug;

	/**
    * File Size
    * 
    * @var int
    */
	protected $file_size;

	/**
    * Video Duration
    * 
    * @var int
    */
	protected $duration;

	/**
    * Bit Rate
    * 
    * @var int
    */
	protected $bit_rate;

	/**
    * Format
    * 
    * @var varchar
    */
	protected $format = 'mp4';

	/**
    * movie
    * 
    * @var Object
    */
	protected $movie;

	/**
    * Video Object
    * 
    * @var Object
    */
	protected $videoObject;

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
     * Extract video data and save details
     *
     * @return $status
     */
    protected function setFfmpeg(){

    	$this->movie = new FFmpegMovie($this->path, null, env('FFMPEG_BIN'));
    	if($this->movie){
    		$this->duration = $this->movie->getDuration();
    		$this->bit_rate = $this->movie->getBitRate();
    	}
    	return TRUE;
    }
    /**
     * Extract video data and save details
     *
     * @return $video object
     */
    public function extractAndSave($path, $title, $file_size){
    	$this->path = $path;
    	$this->title = $title;
    	$this->file_size = $file_size;
    	$this->slug = AppHelper::slugify($title);
    	$this->setFfmpeg();
    	if($this->save()){
    		return $this->videoObject;
    	}
    	
    }

    /**
     * Save video data
     *
     * @return $status
     */
    public function save(){
    	$this->videoObject = new $this->video;
        $this->videoObject->user_id = Auth::id();
    	$this->videoObject->title = $this->title;
    	$this->videoObject->path = $this->path;
    	$this->videoObject->slug = $this->slug;
    	$this->videoObject->file_size = $this->file_size;
    	$this->videoObject->duration = $this->duration;
    	$this->videoObject->bit_rate = $this->bit_rate;
    	$this->videoObject->format = $this->format;
    	if($this->videoObject->save()){
    		return TRUE;
    	}
    }
}