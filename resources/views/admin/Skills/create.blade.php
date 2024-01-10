@extends('layout.main')

@section('content')
    <h1>Insert a new skill:</h1>

    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form
    action="{{route('admin.skills.store')}}"
    method="POST">

    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Skill name</label>
        <input
        type="text"
        class="form-control
        @error('name')
        is-invalid
        @enderror"
        id="name"
        name="name"
        value="{{old('name')}}">
    </div>

    <div class="mb-3">
        <textarea
        name="description"
        id="description"
        cols="150"
        rows="10"
        class="@error('description')
        is-invalid
        @enderror">
        {{old('description', 'Insert a description for this skill')}}
        </textarea>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Particular Buff</label>
        <input
        type="text"
        class="form-control
        @error('particular_buff')
        is-invalid
        @enderror"
        id="particular_buff"
        name="particular_buff"

        value="{{old('particular_buff')}}">
    </div>


    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-success"> Submit</button>
        <button type="reset" class="btn btn-danger"> Reset</button>
    </div>

    </form>
@endsection
