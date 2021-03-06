@extends('layouts.app')

@section('title', ' - Work edit')

@section('content')
    <div class="row bg-dark m-0">
        @if ($errors->any())
            <div class="col-12 bg-gradient-danger">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() AS $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="col-12 bg-gradient-success">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <div class="col-12 bg-gradient-dark">
            <form action="{{ action('AdminController@store', $work->id) }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <h3 class="text-white">Editing work <span class="text-danger">id, {{ $work->id }}</span></h3>
                    <span class="text-white">Created by: {{ $work->user->name }}, at {{ $work->created_at }}</span>

                    <div class="col-sm-12 p-2">
                        <button type="submit" class="btn btn-danger btn-lg btn-block">Save changes</button>
                    </div>

                    <div class="m-0 row bg-gradient-secondary">
                        {{ csrf_field() }}
                        <div class="col-sm-6">
                            <div class="row m-0">
                                <div class="col bg-transparent border-0">
                                    <label for="name">Job name</label>
                                    <input type="text" class="form-control" value="{{ $work->name }}" id="name" name="name">
                                </div>
                                <div class="col bg-transparent border-0">
                                    <label for="langs">Job langs</label>
                                    <input type="text" class="form-control" value="{{ $work->lang }}" id="langs" name="langs">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc">Job description</label>
                                <textarea class="form-control" id="desc" name="desc" rows="3">{{ $work->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Select Or Drag <b>photos</b></label>
                                <input type="file" name="photos[]" class="form-control" multiple="">
                            </div>
                        </div>
                        <div class="col-sm-6 bg-transparent border-0 pt-0 pb-0">
                            <div class="row">
                                @foreach($images AS $image_key => $image)
                                    <div class="col-sm-3 bg-transparent">
                                        <img src="/{{ $image }}" class="figure-img img-fluid rounded" alt="...">
                                        <a href="{{ url('/admin/work-image-delete/'.$work->id.'/'.$image_key) }}" class="btn btn-danger">Remove</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection