@extends('layout.main')

@section('content')
    <div class=""
        style="min-height: 100vh; overflow: hidden; background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
        <div class="row">
            <div class="col-lg-2 col-md-4 pr-0 bg-light" style="height: 100vh;">
                <div class="list-group mt-3" style="border-radius: 0">
                    <a href="{{ route('user.body_track') }}" class="list-group-item list-group-item-action">
                        Body Tracking
                    </a>
                    <a href="{{route('user.consult')}}" class="list-group-item list-group-item-action">Consultant</a>
                    <a href="{{ route('user.food') }}" class="list-group-item list-group-item-action"
                        style="background-color: #2CA4D8; color: white">Food Recommendation</a>
                    <a href="{{ route('user.workout') }}" class="list-group-item list-group-item-action">Workout</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="list-group-item list-group-item-action" type="submit">Logout</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-10 col-md-8">
                <div class="container py-5">
                    <h1 style="color:#2CA4D8" class="text-center">Healthy Food This Week!!!</h1>
                    <div class="row mt-5">
                        @foreach ($food as $key => $item)
                            <div class="col-md-3">
                                <div class="card shadow" style="width: 100%;">
                                    <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->name }}"
                                        style="object-fit: cover; height: 300px;">
                                    <div class="card-body bg-light">
                                        <h2 class="card-title">{{ $item->name }}</h2>
                                        <p class="card-text">
                                            @if (strlen($item->description) > 150)
                                                {{ substr($item->description, 0, 150) . '...' }}
                                            @else
                                                {{ $item->description }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
