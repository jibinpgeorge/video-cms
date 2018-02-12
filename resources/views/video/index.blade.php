@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Video</div>

                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('upload') }}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="title">Title</label>  
                              <div class="col-md-4">
                              <input id="title" name="title" type="text" placeholder="Title" class="form-control input-md" value="{{old('title')}}">
                              </div>
                            </div>

                            <!-- File Button --> 
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="video">Choose Video</label>
                              <div class="col-md-4">
                                <input id="video" name="video" class="input-file" type="file">
                              </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="submit"></label>
                              <div class="col-md-4">
                                <button id="submit" name="submit" class="btn btn-primary">Save</button>
                              </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
