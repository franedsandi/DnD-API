@extends('layout.main')

@section('content')
@if (session('deleted'))
<div class="alert alert-danger" role="alert">
    {{session('deleted')}}
</div>
@endif

@include('admin.partials.searchbar', ['route' => route('admin.characters.index', $characters), 'name' => 'characters'])

<div class="characters d-flex flex-wrap gap-2 my-3 justify-content-center">

@foreach ($characters as $character)
    <a class="text-decoration-none text-white h-100" href="{{ route('admin.characters.show', $character)}}">
        <div class="card item p-2 text-white my-4" style="width: 17rem;">
            <img src="{{$character->picture}}" class="card-img-top w-100" alt="{{$character->name}}">
            <div class="card-body">
                <h3 class="card-title">{{$character->name}}</h3>
                <h4>{{$character->race['name']}}</h4>
                <p class="card-text">HEIGHT: {{$character->height}}mts</p>
                <p class="card-text">WEIGHT: {{$character->weight}} Kg</p>
                <p class="card-text">STORY: {{$character->background}}</p>
            </div>
            <div class="d-flex gap-2 justify-content-center">
                @include('admin.partials.show_button', ['route' => route('admin.characters.show', $character)])
                @include('admin.partials.edit_boton', ['route' => route('admin.characters.edit', $character)])
                @include('admin.partials.delete_boton', ['route' => route('admin.characters.destroy', $character), 'type' => 'character' , 'name' => $character->name ])
            </div>
        </div>
    </a>

    @endforeach
</div>

<div class="mt-5 d-flex justify-content-center" style="color: white">
    {{ $characters->appends(['search' => $searchTerm])->links() }}
</div>



@endsection
