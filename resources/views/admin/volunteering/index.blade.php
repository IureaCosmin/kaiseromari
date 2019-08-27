@extends('layouts.admin_layout')

@section('content')
    <div class="container">
    <h3 class="mb-4">Volunteering positions</h3>
    <a href="{{ route('volunteering.create') }}" class="btn btn-success mb-2">New volunteering position</a>
    <hr>

    <div class="w-100 d-flex flex-wrap">
        @forelse($volunteerings as $volunteering)
        <div class="p-3" style="width: 33%;">
            <h5>{{$volunteering->title}}</h5>
            <div style="height:auto;word-wrap: break-word;">{{$volunteering->description}}</div>
            <p><strong>Cost:</strong> {{$volunteering->price}}</p>
            <p><strong>State</strong> - <span class="<?php echo $volunteering->state == 'open' ? 'text-success' : 'text-danger'; ?>">{{$volunteering->state}}<span></p>
            <a href="/volunteering/{{$volunteering->id}}/edit" class="btn btn-secondary col-12 my-1 d-flex justify-content-center"><img src="{{asset('/images/admin/edit.svg')}}" height="13px" width="13px"></a>
            <a href="{{route('volunteering.destroy', $volunteering->id)}}" onclick="event.preventDefault();document.getElementById('delete-form').submit();" class="btn btn-danger col-12 my-1 d-flex justify-content-center"><img src="{{asset('/images/admin/trash.svg')}}" height="13px" width="13px"></a>
            <form id="delete-form" action="{{route('volunteering.destroy', $volunteering->id)}}" method="post" style="display: none;">
                @method('DELETE')
                @csrf
            </form>
        </div>
        @empty
            <p class="pt-3">You haven't opened any volunteering positions. To open one, click on <strong>New volunteering position</strong>.</p>
        @endforelse
    </div>
    {{-- <div>
        <div>
            <h4>Open positions</h4>
        </div>
{{route('')}}
        <div>
            <h3>Closed positions</h3>
        </div>
    </div> --}}
    </div>
@endsection