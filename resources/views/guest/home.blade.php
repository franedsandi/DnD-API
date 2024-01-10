@extends('layouts.guest')
@section('content')

<section class="container p-3 fs-5">

    @guest
        @if (Route::has('login'))
            <p class="m-0">
                Thank you for downloading this project: this is its back-end side. <br /> You can clone the front-end one from
                <a class="text-white fw-bold" href="https://github.com/erikvella/front-d-and-d.git">here</a> and follow the istructions inside readme.md file.
            </p>
            <p class="mt-4">
                You're more than welcome to  <a class="fw-bold text-white" href="{{ route('register') }}">{{ __('register') }}</a>, <a class="fw-bold text-white" href="{{ route('login') }}">{{ __('login') }}</a> and contribute!
            </p>
        @endif
        @else
            <p>
                Thank you for taking the time to register and log in! <br /> We truly appreciate your engagement and value your feedback. Our platform is always evolving, and we are open to any suggestions you may have to enhance your experience. <br /> Feel free to share your thoughts, ideas, or any features you'd like to see implemented. We're here to make your experience as seamless and enjoyable as possible.
            </p>

    @endguest



</section>


@endsection
