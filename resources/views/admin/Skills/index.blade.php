@extends('layout.main')

@section('content')

@include('admin.partials.session_messages')
<div class="d-flex align-items-center">

    <h1>SKILLS</h1>
    <div class="ms-3">
        @include('admin.partials.create_boton', ['route' => route('admin.skills.create'), 'add' => 'Insert a new Skill'] )
    </div>
</div>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col" class="w-75">Skill</th>
        <th scope="col">Actions</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($skills as $skill )

      <tr>
        <td>{{$skill->name}}</td>
        <td>
            <div class="d-flex gap-2">

                @include('admin.partials.show_button', ['route' => route('admin.skills.show', $skill)])

                @include('admin.partials.edit_boton', ['route' => route('admin.skills.edit', $skill)])

                @include('admin.partials.delete_boton', ['route' => route('admin.skills.destroy', $skill), 'type' => 'skill' , 'name' => $skill->name ])

            </div>

        </td>

      </tr>
      @endforeach

    </tbody>
  </table>
@endsection
