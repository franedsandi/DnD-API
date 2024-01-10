@extends('layout.main')

@section('content')
<div class="races">
    <h2>Edit race</h2>

    <div class="my-3 d-flex justify-content-center ">
        <form class="text-warning fw-semibold w-50" action="{{route('admin.races.update', $race)}}" method="POST">
        @csrf
        @method('PUT')
        {{-- Stampa tutti gli errori --}}
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" style="width: 100%" value="{{old('name', $race->name)}}">
                @error('name')
                <p class="text-danger fw-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="picture_link" class="form-label">link image</label>
                <input type="text" class="form-control" id="picture_link" name="picture_link" style="width: 100%" value="{{old ('picture', $race->picture_link)}}">
                @error('picture_link')
                <p class="text-danger fw-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 d-flex flex-column">
                <label for="race" class="form-label">Description</label>
                <textarea type="text" id="description" name="description" value="{{old('description', $race->description)}}">
                    {{ old('description', $race->description) }}
                </textarea>
                @error('description')
                    <p class="text-danger fw-bold">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex flex-wrap gap-2">
                <div class="mb-3 w-25">
                    <label for="mod_for" class="form-label">mod_for</label>
                    <input type="number" class="form-control" id="mod_for" name="mod_for" value="{{old('mod_for', $race->mod_for )}}">
                    @error('mod_for')
                    <p class="text-danger fw-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="mod_des" class="form-label">mod_des</label>
                    <input type="number" class="form-control" id="mod_des" name="mod_des" value="{{old('mod_des', $race->mod_des)}}">
                    @error('mod_des')
                    <p class="text-danger fw-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="mod_cos" class="form-label">mod_cos</label>
                    <input type="number" class="form-control" id="mod_cos" name="mod_cos" value="{{old('mod_cos', $race->mod_cos)}}">
                    @error('mod_cos')
                    <p class="text-danger fw-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="mod_int" class="form-label">mod_int</label>
                    <input type="number" class="form-control" id="mod_int" name="mod_int" value="{{old('mod_int', $race->mod_int)}}">
                    @error('mod_int')
                    <p class="text-danger fw-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="mod_sag" class="form-label">mod_sag</label>
                    <input type="number" class="form-control" id="mod_sag" name="mod_sag" value="{{old('mod_sag', $race->mod_sag)}}">
                    @error('mod_sag')
                    <p class="text-danger fw-bold">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="mod_car" class="form-label">mod_car</label>
                    <input type="number" class="form-control" id="mod_car" name="mod_car" value="{{old('mod_car', $race->mod_car)}}">
                    @error('mod_car')
                    <p class="text-danger fw-bold">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning"> Submit</button>
                <button type="reset" class="btn btn-danger"> Reset</button>
            </div>

        </form>
    </div>
</div>
@endsection
