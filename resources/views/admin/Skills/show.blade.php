@extends('layout.main')

@section('content')

@include('admin.partials.session_messages')
    <h1>{{$skill->name}}</h1>

    <p>{{$skill->description}}</p>

    <p>Buff: {{$skill->particular_buff}}</p>

    <a class="btn btn-warning" href="{{route('admin.skills.index')}}">
        <i class="fa-solid fa-arrow-left fa-beat-fade"></i>
    </a>
@endsection
