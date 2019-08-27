@extends('layouts.admin_layout')

@section('content')
    <div class="container">
    
        <div class="row mb-4">
            <div class="col-sm-8 font-weight-bold">Title</div>
            <div class="col-sm-2 font-weight-bold">Deleted at</div>
            <div class="col-sm-2 font-weight-bold"></div>
        </div>
        {{-- <hr> --}}

    @forelse($trashed as $trash)
        <div class="row my-0">
            <div class="col-sm-8 d-flex align-items-center">{{$trash->title}}</div>
            <div class="col-sm-2 d-flex align-items-center">{{$trash->deleted_at->format('Y/m/d')}}</div>
            <div class="col-sm-2 d-flex align-items-center">
                <a href="/posts/trash/{{$trash->id}}/restore" onclick="event.preventDefault();document.getElementById('restore-form').submit();" class="btn btn-primary">Restore</a>
                <form id="restore-form" action="/posts/trash/{{$trash->id}}/restore" method="get" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <hr class="my-1 py-0">

        {{-- <h1>{{$trash->title}}</h1>
        <a href="/posts/trash/{{$trash->id}}/restore" onclick="event.preventDefault();document.getElementById('restore-form').submit();" class="btn btn-primary">Restore</a>
        <form id="restore-form" action="/posts/trash/{{$trash->id}}/restore" method="get" style="display: none;">
            @csrf
        </form> --}}
    @empty 
        <p>You have no deleted posts.</p>
    @endforelse
    </div>
@endsection