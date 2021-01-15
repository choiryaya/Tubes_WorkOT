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
                    <h1 style="color:#2CA4D8" class="text-center">Food Recommendation</h1>
                    <a class="btn btn-secondary mt-5 mb-3" href="{{ route('food.create') }}">
                        Add New Recommendation
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Item Link</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($food as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->image }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-primary mr-3" href="{{route('food.edit', $item->id)}}">
                                                Update
                                            </a>
                                            <form method="POST" action="{{route('food.destroy', $item->id)}}">
                                                @csrf @method('delete')
                                                <input type="hidden" name="id" value="{{$item->id}}" />
                                                <button class="btn btn-danger" type="submit">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
