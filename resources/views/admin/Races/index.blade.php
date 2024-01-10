@extends('layout.main')

@section('content')
<div class="races">
    <div class="d-flex">
        @include('admin.partials.create_boton', ['route' => route('admin.races.create'), 'add' => 'add race'] )
        @include('admin.partials.searchbar', ['route' => route('admin.races.index', $races), 'name' => 'race'])
    </div>


    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif


    <div class="races d-flex flex-wrap gap-2 my-3 justify-content-center">
    @foreach ($races as $race )
        <a class="text-decoration-none text-white h-100" href="{{ route('admin.races.show', $race)}}">
            <div class="card item p-2 text-white" style="width: 17rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$race->name}}</h5>
                    <div class="image py-2">
                        <img class="w-100 rounded" src="{{$race->picture_link}}" alt="{{$race->name}}">
                    </div>
                    <p class="card-text">{{$race->description}}</p>
                    <div class="d-flex gap-2 justify-content-center">
                        @include('admin.partials.show_button', ['route' => route('admin.races.show', $race)])
                        @include('admin.partials.characters_race_btn', ['route' => route('admin.character-races', $race)])
                        @include('admin.partials.edit_boton', ['route' => route('admin.races.edit', $race)])
                        @include('admin.partials.delete_boton', ['route' => route('admin.races.destroy', $race), 'type' => 'race' , 'name' => $race->name ])
                    </div>
                </div>
            </div>
        </a>
    @endforeach
    </div>

    <div class="mt-5 d-flex justify-content-center" style="color: white">
        {{ $races->appends(request()->query())->links() }}

    </div>
</div>
@endsection
