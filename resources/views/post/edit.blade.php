@extends('layouts.app')

@section('title')
    Edit Post
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-8 d-flex">
                            <h3 class="">Edit Post</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-red">DELETE</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('posts.update', $post->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" name="title" type="text" value="{{ old('title', $post->title) }}" />
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control">{{ old('content', $post->content) }}</textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="submit" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection