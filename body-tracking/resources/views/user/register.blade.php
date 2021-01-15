@extends('layout.main')

@section('content')
    <div style="background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <div class="bg-white rounded p-3 shadow">
                        <h2>Mendaftar</h2>
                        <h6>Isi form dibawah ini untuk mendaftarkan akun baru.</h6>
                        @if (!$error)
                            <form action="{{ route('user.register_eval') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="name" aria-describedby="nameHelp" required placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
                                        placeholder="example@email.com">
                                    @if ($error && $error['email_error'])
                                        <small id="emailHelp" class="form-text text-danger">Email sudah digunakan!.</small>
                                    @else
                                        <small id="emailHelp" class="form-text text-muted">Kami tidak akan pernah membagikan email Anda dengan orang lain.</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="********">
                                </div>
                                <div class="d-flex">
                                    <small class="my-auto mr-auto">Sudah punya akun ? <a
                                            href="{{ route('user.login') }}">masuk</a>.</small>
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('user.register_eval') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" name="name" required aria-describedby="nameHelp"
                                        placeholder="Namamu" value="{{ $error['name'] }}">
                                        
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control is-invalid" name="email"
                                        aria-describedby="emailHelp" placeholder="example@email.com"
                                        value="{{ $error['email'] }}">
                                    @if ($error && $error['email_error'])
                                        <small id="emailHelp" class="form-text text-danger">Email sudah digunakan!.</small>
                                    @else
                                        <small id="emailHelp" class="form-text text-muted">Kami tidak akan pernah membagikan email Anda dengan orang lain.</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="********">
                                </div>
                                <div class="d-flex">
                                    <small class="my-auto mr-auto">Udah punya akun ? <a
                                            href="{{ route('user.login') }}">masuk</a>.</small>
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="col-md mt-3">
                    <h1 style="color:#2CA4D8; right: 0%; max-width: 300px"
                        class="text-right position-absolute font-weight-bold">Healthy Is The Greatest Gift.</h1>
                    <img src='{{ URL::asset('svg/eating_together.svg') }}' width="100%" />
                </div>
            </div>
        </div>
    </div>
@endsection
