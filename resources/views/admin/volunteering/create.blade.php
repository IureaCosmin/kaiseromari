@extends('layouts.admin_layout')

@section('content')
<div class="container">
    <form action="/volunteering" enctype="multipart/form-data" method="POST">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="row">
                    <h3 style="margin: auto">Open a new volunteering position</h3>
                </div>
                <div class="row mt-5">
                    <label for="title" class="col-md-12 col-form-label">Title of the volunteering opening:</label>
                    <input maxlength="254" id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mt-3">
                    <label for="description" class="col-md-12 col-form-label">Description of the volunteering opening:</label>
                    <textarea rows="6" maxlength="254" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>
                        
                    </textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mt-3">
                    <label for="price" class="col-md-12 col-form-label">The cost of the volunteering opening:</label>
                    <input maxlength="254" id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price" autofocus></textarea>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mt-3 d-flex align-items-center">
                        <label for="state" class="col-form-label col-md-11">Uncheck if you want the volunteering position to be closed and not displayed on the main page (you can edit this later):&nbsp;&nbsp;</label>
                        <input type="checkbox" class="form-control col-md-1" style="width: 25px; height: 25px; display: inline-block" name="state" value="open" checked>
                    </div>

                {{-- <div class="row mt-3">
                    <label for="cover" class="col-md-4 col-form-label">Add a cover image for your post:</label>
                    <input type="file" class="form-control-file" id="cover" name="cover">
                    @error('cover')
                        <strong>{{ $message }}</strong>
                    @enderror
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