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
                    <a href="{{ route('user.food') }}" class="list-group-item list-group-item-action">Food
                        Recommendation</a>
                    <a href="{{ route('user.workout') }}" class="list-group-item list-group-item-action" style="background-color: #2CA4D8; color: white">Workout</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="list-group-item list-group-item-action" type="submit">Logout</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-10 col-md-8">
                <div class="container py-5">
                    <h1 style="color:#2CA4D8" class="text-center">Weight Loss With Us!!!</h1>
                    <iframe src="https://www.youtube.com/embed/g_tea8ZNk5A" width="100%" class="mt-5 rounded"></iframe>
                        
                    <div class="row mt-5">
                        <div class="col-md-4">
                            <h5>Fix Your Posture in Ten Minutes</h5>
                            <iframe src="https://www.youtube.com/embed/eLfIsFl1Cac" class="rounded" width="100%" ></iframe>
                        </div>
                        <div class="col-md-4">
                            <h5>15 Minutes Booty and Leg Workout</h5>
                            <iframe src="https://www.youtube.com/embed/_Y2k5O6Puik" class="rounded" width="100%" ></iframe>
                        </div>
                        <div class="col-md-4">
                            <h5>Full Body Workout</h5>
                            <iframe src="https://www.youtube.com/embed/3eay48JwTPI" class="rounded" width="100%" ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
