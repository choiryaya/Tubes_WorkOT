@extends('layout.main')

@section('content')
    <div class=""
        style="min-height: 100vh; overflow: hidden; background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
        <div class="row">
            <div class="col-lg-2 col-md-4 pr-0 bg-light" style="height: 100vh;">
                <div class="list-group mt-3" style="border-radius: 0">
                    <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action active"
                        style="background:#2CA4D8">Food
                        Recommendation</a>
                    <a href="{{ route('admin.user_list') }}" class="list-group-item list-group-item-action">Consultant</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="list-group-item list-group-item-action" type="submit">Logout</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-10 col-md-8">
                <div class="container py-5">
                    <h1 style="color:#2CA4D8" class="text-center mb-4">Consultation</h1>
                    <div>
                        @foreach ($users as $key => $item)
                            <div class="alert alert-primary d-flex align-items-center" style="justify-content: space-between" role="alert">
                                <h5 class="mb-0">{{ $item->username }}</h5>
                                <form action="{{route('message.show', $item->user_id)}}" method="GET">
                                    @csrf
                                    <button class="btn btn-primary" type="submit">
                                        Go To
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
