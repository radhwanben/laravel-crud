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

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">image</th>
                            <th scope="col">Creator</th>
                            <th scope="col">title</th>
                            <th scope="col">body</th>
                            <th scope="col">Settings</th>
                          </tr>
                        </thead>
                        <tbody>
                              @foreach ($posts as $post )
                          <tr>
                          <td><img class="img" src="storage/{{$post->photo}}" /></td>
                          <td>{{$post->user->name}}</td>
                          <td>{{$post->title}}</td>
                          <td>{{str_limit($post->body,10)}}</td>
                          <td><a href=" /post/{{$post->title}}" class="btn btn-success btn-sm">Show </a>
                            <td><a href="{{$post->id}} /edit" class="btn btn-secondary btn-sm">edit</a>
                          </td><td> <form action="{{route('DeletePost',['id'=>$post->id])}}" method="POST">
                              {{ csrf_field() }} {{ method_field('DELETE') }}
                              <input class="btn  btn-danger btn-sm" value="delete" type="submit" onclick="return confirm('Are you sure you want to delete this item?');">
                          </form></td>
                              @endforeach
                          </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
