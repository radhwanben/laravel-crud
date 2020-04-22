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

                    You are logged in as ! author
                    <br>
                    <a class="btn btn-primary" href="{{route('CreatePost')}}"> create post </a>
                    <a class="btn btn-success" href="{{route('MyPosts')}}"> show posts </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
