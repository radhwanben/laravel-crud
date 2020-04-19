@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard
                <a href="{{route('CreatePost')}}" class="btn btn-info btn-sm">create new post</a>

                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/storage/{{$post->photo}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">{{$post->title}}</h5>
                          <p class="card-text">{{$post->body}}</p>
                          <p class="card-text">creator: {{$post->user->name}}</p>
                        <a href="{{route('MyPosts')}}" class="btn btn-primary">back</a>
                        </div>
                      </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
