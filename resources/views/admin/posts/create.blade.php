@extends('layouts.admin_layout')

@section('content')
<div class="container">
    <form action="/posts" enctype="multipart/form-data" method="POST">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h3 style="margin: auto">Create a new post for the news section</h3>
                </div>
                <div class="row mt-5">
                    <label for="title" class="col-md-12 col-form-label">Give your new post a name:</label>
                    <input maxlength="254" id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mt-3">
                    <label for="description" class="col-md-12 col-form-label">Write a short description for your post that will appear as a preview (max. 255 characters):</label>
                    <input maxlength="254" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mt-3">
                    <label for="content" class="col-md-12 col-form-label">This is where you write the main content of your post, that will appear on the post page:</label>
                    <textarea rows="10" id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" autocomplete="content" autofocus></textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mt-3">
                    <label for="cover" class="col-md-4 col-form-label">Add a cover image for your post:</label>
                    <input type="file" class="form-control-file" id="cover" name="cover">
                    @error('cover')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="images[]">Multiple File Select</label>
                    <input type="file" class="form-control" name="files[]" multiple="multiple">
                </div>

                {{-- <div class="row py-3" >
                    <label for="filename[]" class="col-md-4 col-form-label">Add images to your post (optional):</label>
                    <input type="file" name="filename[]" class="form-control"> 
                    <button class="btn btn-success my-2 add" type="button">Add</button>
                </div> --}}

                <div class="row mt-3 pt-4">
                    <button class="btn btn-primary col-md-2" style="margin:auto">Submit</button>
                </div>
            </div>
        </div>

        @csrf
    </form>
</div>

@endsection