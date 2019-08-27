@extends('layouts.admin_layout')

@section('content')
<div class="container">
    <form action="/posts/{{$post->id}}" enctype="multipart/form-data" method="post">
        @method('PATCH')
        <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h3 style="margin: auto">Edit post</h3>
                    </div>
                    <div class="row mt-5">
                        <label for="title" class="col-md-12 col-form-label">Edit the title of the post:</label>
                        <input maxlength="254" id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $post->title }}" autocomplete="title" autofocus>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mt-3">
                        <label for="description" class="col-md-12 col-form-label">Edit the description of the post (max. 255 characters):</label>
                        <input maxlength="254" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $post->description }}" autocomplete="description" autofocus>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="row mt-3">
                        <label for="content" class="col-md-12 col-form-label">Edit the content of the post:</label>
                        <textarea rows="10" id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" autocomplete="content" autofocus>{{ old('content') ?? $post->content }}</textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="row mt-3">
                        <label for="cover" class="col-md-4 col-form-label">Edit the cover image of the post:</label>
                        <input type="file" class="form-control-file" id="cover" name="cover">
                        @error('cover')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
    
                    <div class="row mt-3 pt-4">
                        <button class="btn btn-primary col-md-2" style="margin:auto">Submit</button>
                    </div>
                </div>
            </div>

        @csrf
    </form>
</div>
@endsection