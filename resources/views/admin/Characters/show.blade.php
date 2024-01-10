@extends('layout.main')

@section('content')

@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
@if (session('updated'))
<div class="alert alert-success" role="alert">
    {{ session('updated') }}
</div>
@endif

<div class="characters text-white">
    <div class="character image">
        <img src="{{$character->picture}}" alt="{{$character->name}}" width="400px">
    </div>
    <div class="py-2">
        <h1 class="card-title py-3">{{$character->name}}</h1>
        <h2>{{$character->race['name']}}</h2>
        <p class="card-text">HEIGHT: {{$character->height}}mts</p>
        <p class="card-text">WEIGHT: {{$character->weight}} Kg</p>
        <p class="card-text">STORY: {{$character->background}}</p>
        <p class="card-text">ARMOR: {{$character->armor_class}}</p>
        <p class="card-text">STRENGHT: {{$character->for}} @if($character->race['mod_for']>0) + {{$character->race['mod_for']}}@endif</p>
        <p class="card-text">DEXTERYTY: {{$character->des}} @if($character->race['mod_des']>0) + {{$character->race['mod_des']}}@endif</p>
        <p class="card-text">CONSTITUTION:{{$character->cos}} @if($character->race['mod_cos']>0) + {{$character->race['mod_cos']}}@endif</p>
        <p class="card-text">INTELLIGENCE: {{$character->int}} @if($character->race['mod_int']>0) + {{$character->race['mod_int']}}@endif</p>
        <p class="card-text">WISDOM: {{$character->sag}} @if($character->race['mod_sag']>0) + {{$character->race['mod_sag']}}@endif</p>
        <p class="card-text">CHARISMA: {{$character->car}} @if($character->race['mod_car']>0) + {{$character->race['mod_car']}}@endif</p>
        @if ($character->skills->isNotEmpty())
            <p class="card-text">SKILLS:</p>
            <ul>
                @foreach ($character->skills as $skill)
                    <li>{{ $skill['name'] }}</li>
                @endforeach
            </ul>
        @endif

    </div>
    <div class="d-flex justify-content-center gap-3">
        @include('admin.partials.edit_boton', ['route' => route('admin.characters.edit', $character)])
        @include('admin.partials.delete_boton', ['route' => route('admin.characters.destroy', $character), 'type' => 'character' , 'name' => $character->name ])
    </div>
</div>


@endsection
