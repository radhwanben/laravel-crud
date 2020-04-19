@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('UpdatePost',['id' =>$post->id])}}" method="post" enctype="multipart/form-data">
                        @csrf 
                        {{ method_field('PUT') }}

                        <div class="form-group col-md-3">

                            <label>post Image</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                       <input type="file" name="file" id="imgInp">
                                    </span>
                                </span>
                            </div>

                        </div>

                        <div class="form-group">
                          <label for="title">title</label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}">
                        </div>
                        <div class="form-group">
                            <label for="body">body</label>
                            <textarea name="body" rows=" 2" class="form-control" >{{$post->body}}</textarea>
                          </div>
                          <div class="form-group">
                            <input class="btn btn-success" type="submit" name="save" value="Update" />
                          <a href="{{route('MyPosts')}}" class="btn btn-secondary">back</a>
                          </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
