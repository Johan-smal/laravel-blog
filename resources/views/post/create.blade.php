@extends('layouts.app')

@section('title')
    New Post
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Post</div>
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
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" name="title" type="text" value="{{ old('title', '') }}" />
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control">{{ old('content', '') }}</textarea>
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