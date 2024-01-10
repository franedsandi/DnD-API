{{-- card to count how many item are inside each table --}}
<div class="col-md-3 col-sm-6 d-flex">
    <div class="serviceBox flex-column flex-fill">
        <a class="text-decoration-none" href="{{ $route }}">
            <div class="service-icon">
                <i class="fa-solid fa-people-group"></i>
            </div>
            <h3 class="title">{{ $title }}</h3>
            <p class="description">
                There are currently {{ count($number) }} {{ $name }}@if(count($number) > 1)s @endif
            </p>

            @if($title === 'characters')
                <p> where you have {{ auth()->user()->characters->count() }} {{ $name }}@if (auth()->user()->characters->count() > 1)s @endif</p>
            @endif
        </a>
    </div>
</div>
