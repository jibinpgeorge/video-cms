@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <video class="tutorial_vid" controls=""> 
                <source src="{{URL::asset($video->path)}}" type="video/mp4" />
           </video>
           <div class="col-md-8">
                <h3> {{$video->title}} </h3>
                <p>Duration: {{AppHelper::timeToSec($video->duration)}} </p>
                <p>Size: {{AppHelper::formatSizeUnits($video->file_size)}}</p>
                <p>Bit Rate: {{$video->bit_rate}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
