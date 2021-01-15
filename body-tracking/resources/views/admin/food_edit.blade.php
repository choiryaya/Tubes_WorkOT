@extends('layout.main')

@section('content')
    <div class=""
        style="min-height: 100vh; overflow: hidden; background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
        <div class="row">
            <div class="col-lg-2 col-md-4 pr-0 bg-light" style="height: 100vh;">
                <div class="list-group mt-3" style="border-radius: 0">
                    <a href="#" class="list-group-item list-group-item-action active" style="background:#2CA4D8">Food
                        Recommendation</a>
                    <a href="{{route('admin.user_list')}}" class="list-group-item list-group-item-action">Consultant</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="list-group-item list-group-item-action" type="submit">Logout</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-10 col-md-8">
                <div class="container py-5">
                    <h1 style="color:#2CA4D8" class="text-center mb-5">Edit Food</h1>
                    <form enctype="multipart/form-data" method="post" action="{{ route('food.update', $food->id) }}">
                        @csrf   @method('put')
                        <div class="mb-3">
                            <label class="form-label">Food Name</label>
                            <input type="text" class="form-control" required name="name" value="{{$food->name}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Food Description</label>
                            <textarea class="form-control" name="desc" required rows="3">{{$food->description}}</textarea>
                        </div>
                        <div class="mb-3" style="max-width: 300px">
                            <label for="formFile" class="form-label">Food Picture</label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
