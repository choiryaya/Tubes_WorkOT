@extends('layout.main')

@section('content')
    <div style="background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-center flex-column">
                    <div class="bg-white rounded p-3 shadow">
                        <h2>Masuk</h2>
                        <h6>Masuk dengan mengisikan email dan password pada form dibawah ini.</h6>
                        @if (!$error)
                            <form action="{{ route('user.login_eval') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
                                        placeholder="example@email.com">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="********">
                                </div>
                                <div class="d-flex">
                                    <small class="my-auto mr-auto">Belum punya akun ? <a
                                            href="{{ route('user.register') }}">daftar</a>.</small>
                                    <button type="submit" class="btn btn-primary">Masuk</button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('user.login_eval') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control is-invalid" value="{{ $error['email'] }}"
                                        name="email" aria-describedby="emailHelp" placeholder="example@email.com">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control is-invalid" name="password"
                                        placeholder="********">
                                </div>
                                <small id="emailHelp" class="form-text text-danger">Email atau password salah!</small>
                                <div class="d-flex">
                                    <small class="my-auto mr-auto">Belum punya akun ? <a
                                            href="{{ route('user.register') }}">daftar</a>.</small>
                                    <button type="submit" class="btn btn-primary">Masuk</button>
                                </div>
                            </form>
                        @endif
                    </div>
                    <div class="mt-4 bg-white align-items-center d-flex rounded p-3 shadow w-100">
                        <h4 class="mb-0 mr-auto">Masuk sebagai Konsultan</h4>
                        <a class="btn btn-primary" href="{{route('admin.login')}}">Masuk</a>
                    </div>
                </div>
                <div class="col-md mt-3">
                    <h1 style="color:#2CA4D8; right: 0%; max-width: 300px" class="text-right position-absolute font-weight-bold">Healthy Is The Greatest Gift.</h1>
                    <img src='{{ URL::asset('svg/donut_love.svg') }}' width="100%" />
                </div>
            </div>
        </div>
    </div>
@endsection
