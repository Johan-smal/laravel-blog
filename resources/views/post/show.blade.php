@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <h3>{{$post->title}}</h3>
                    <a href="{{route('user.posts', $post->user->id)}}"><span>{{$post->user->name}}</span></a>
                </div>
                <div class="col-md-4 text-right">
                    @if ($post->user->id == Auth::user()->id)
                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit Post</a>
                    @endif
                </div>
            </div>
            
        </div>
        <div class="card-body">
            {{$post->content}}
        </div>
    </div>
</div>
@endsection