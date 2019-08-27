@extends('layouts.admin_layout')

@section('content')

    <div class="container">
        <h1 class="mb-4">Posts</h1>
        
        <div class="w-100 d-flex justify-content-between">
            <a href="/posts/create" class="btn btn-success d-flex justify-content-center align-items-center">Create new post</a>
            <a href="/posts/trash" class="btn btn-primary d-flex justify-content-center align-items-center"><img src="{{asset('/images/admin/trash.svg')}}" height="13px" width="13px">&nbsp;&nbsp;View deleted posts</a>
        </div>
        <hr>

        <div class="row py-2">
            <div class="col-md-3 font-weight-bold text-center">Title</div>
            <div class="col-md-2 font-weight-bold text-center">Cover image</div>
            <div class="col-md-2 font-weight-bold text-center">Date</div>
            <div class="col-md-4 font-weight-bold text-center">Description</div>
            <div class="col-md-1 font-weight-bold text-center"></div>
        </div>
        <hr>

        @forelse($posts as $post)

            <div class="row py-2">
                <div class="col-md-3">{{$post->title}}</div>
                <div class="col-md-2 text-center"><img src="/storage/{{ $post->cover }}" style="width:100%; height: 120px; object-fit: cover" alt=""></div>
                <div class="col-md-2 text-center">{{$post->created_at->format('Y/m/d')}}</div>
                <div class="col-md-4">{{$post->description}}</div>
                <div class="col-md-1">
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary col-12 my-1 d-flex justify-content-center"><img src="{{asset('/images/admin/edit.svg')}}" height="13px" width="13px"></a>
                    <a href="/posts/{{$post->id}}/delete" onclick="event.preventDefault();document.getElementById('delete-form').submit();" class="btn btn-danger col-12 my-1 d-flex justify-content-center"><img src="{{asset('/images/admin/trash.svg')}}" height="13px" width="13px"></a>
                    <form id="delete-form" action="/posts/{{$post->id}}/delete" method="post" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            <hr>

        @empty
            <p>You haven't written any posts yet. To start writing, click on the button <strong>Create new post</strong>.</p>
        @endforelse
        
        <div class="row">
            <div class="col-12 my-5">
                {{ $posts->links() }}
            </div>
        </div>

        {{-- <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <td>Title</td>
                        <td>Cover image</td>
                        <td>Created at</td>
                        <td>Description</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>
                        <img src="/storage/{{ $post->cover }}" height="150px" width="150px" alt="">
                    </td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->description}}</td>
                    <td>
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit post</a>
                        <a href="/posts/{{$post->id}}/delete" onclick="event.preventDefault();document.getElementById('delete-form').submit();" class="btn btn-danger">Delete post</a>
                        <form id="delete-form" action="/posts/{{$post->id}}/delete" method="get" style="display: none;">
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <p>You haven't written any posts yet. To start writing, click on the button <strong>Create new post</strong>.</p>
            @endforelse
                </tbody>
            </table>
        </div> --}}
    </div>
@endsection