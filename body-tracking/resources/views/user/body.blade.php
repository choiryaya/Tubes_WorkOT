@extends('layout.main')

@section('content')
    <div class=""
        style="min-height: 100vh; overflow: hidden; background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
        <div class="row">
            <div class="col-lg-2 col-md-4 pr-0 bg-light" style="height: 100vh;">
                <div class="list-group mt-3" style="border-radius: 0">
                    <a href="{{ route('user.body_track') }}" class="list-group-item list-group-item-action"
                        style="background-color: #2CA4D8; color: white">
                        Body Tracking
                    </a>
                    <a href="{{route('user.consult')}}" class="list-group-item list-group-item-action">Consultant</a>
                    <a href="{{ route('user.food') }}" class="list-group-item list-group-item-action">Food
                        Recommendation</a>
                    <a href="{{ route('user.workout') }}" class="list-group-item list-group-item-action">Workout</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="list-group-item list-group-item-action" type="submit">Logout</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-10 col-md-8">
                <div class="container py-5">
                    <h1 style="color:#2CA4D8" class="text-center">Health Report</h1>
                    <div class="row mt-5">
                        <div class="col-lg-5">
                            <div class="p-3" style="background-color: #EBEBEB">
                                <h3 class="text-center" style="color:#2CA4D8">
                                    Body Tracking
                                </h3>
                                <form action="{{ route('track.store') }}" class="mt-4" method="post">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Height</span>
                                        <input type="number" step="0.01" class="form-control" name="height">
                                        <span class="input-group-text">Metre</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Weight</span>
                                        <input type="number" class="form-control" name="weight">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Week</span>
                                        <input type="number" class="form-control" name="week">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Week</th>
                                        <th scope="col">Height</th>
                                        <th scope="col">Weight</th>
                                        <th scope="col">Input Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($track as $item)
                                        <tr>
                                            <th scope="row">{{ $item->week }}</th>
                                            <td>{{ $item->height }}</td>
                                            <td>{{ $item->weight }}</td>
                                            <td>{{ $item->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h6>
                                Laporan akan muncul setelah kamu menginputkan data setidaknya 4 minggu.
                            </h6>
                            @if (count($track) > 3)
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="button" class="btn btn-primary" style="background-color: #2CA4D8"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Results
                                    </button>
                                </div>
                            @endif
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hasil</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ URL::asset('svg/bike.svg') }}" width="100%" />
                                            <h2 class="text-primary mt-3 font-weight-bold">
                                            @if ($result >= 25)
                                                Kamu Mengalami Obesitas
                                            @elseif($result < 25 && $result>= 23)
                                                Berat Badanmu Berlebih
                                            @elseif($result < 23 && $result>= 18.5)
                                                Berat Badanmu Normal
                                            @else
                                                Kamu Kurus
                                            @endif
                                            </h2>
                                            <h5 class="mt-3">Indeks Berat Badanmu</h5>
                                            <h1 class="text-primary">{{ substr(strval($result), 0, 4) }}</h1>
                                            @if ($result >= 25)
                                            <hr/>
                                            <div class="mt-3">
                                                <h5>Notes Buat Kamu</h5>
                                                <p>Jangan makan coklat, fast food, soda, gorengan, daging berlemak.</p>
                                            </div>
                                            @elseif($result < 25 && $result>= 23)
                                            <hr/>
                                            <div class="mt-3">
                                                <h5>Notes Buat Kamu</h5>
                                                <p> kurangi makan makanan yang mengandung gula, tepung, dan snack.</p>
                                            </div>
                                            @elseif($result < 23 && $result>= 18.5)
                                                Berat Badanmu Normal
                                            @else
                                            <hr/>
                                            <div class="mt-3">
                                                <h5>Notes Buat Kamu</h5>
                                                <p class="mb-1">Silahkan cek rekomendasi makanan.</p>
                                                <a class="btn btn-primary" href="{{route('user.food')}}">
                                                Cek Rekomendasi Makanan
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
