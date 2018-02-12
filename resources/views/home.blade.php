@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($videos->count() > 0)
        <div class="col-md-12">

            @foreach($videos as $video)
            <div class="row">
                <div class="col-md-4">
                    <a href="{{URL::to('video/'.$video->slug.'/'.$video->id)}}">
                       <video class="tutorial_vid"> 
                          <source src="{{$video->path}}" type="video/mp4" />
                       </video>
                    </a>
                </div>
                <div class="col-md-8">
                    <h3><a href="{{URL::to('video/'.$video->slug.'/'.$video->id)}}"> {{$video->title}} </a></h3>
                    <p>Duration: {{AppHelper::timeToSec($video->duration)}}</p>
                    <p>Size: {{$video->file_size}}</p>
                    <p>Bit Rate: {{$video->bit_rate}}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-12">
            {{ $videos->links() }}
        </div>
        @else
            <div class="col-md-12 text-center">
                <a class="btn btn-danger btn-lg" href="{{URL::to('upload')}}">Upload Video</a>
            </div>
        @endif
    </div>
</div>
@endsection
