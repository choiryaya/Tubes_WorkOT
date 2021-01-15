@extends('layout.main')

@section('content')
    <div class=""
        style="min-height: 100vh; overflow: hidden; background-image:url('https://pcpm35rekrutmenbi.id/assets/images/bacground_white.jpg')">
        <div class="row">
            <div class="col-lg-2 col-md-4 pr-0 bg-light" style="height: 100vh;">
                <div class="list-group mt-3" style="border-radius: 0">
                    <a href="{{route('admin.index')}}" class="list-group-item list-group-item-action active" style="background:#2CA4D8">Food
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
                    <h1 style="color:#2CA4D8" class="text-center mb-4">Consultation</h1>
                    
                    <div class="bg-light w-100 border rounded p-3 d-flex flex-column" style="height: 600px">
                        @foreach ($msg as $key => $item)
                            @if($item->isAdmin)
                            <div class="p-3 mr-auto my-1 rounded text-white py-2" style="background-color: #056162;">
                                <small>Admin <small class="ml-2 text-muted">{{$item->created_at}}</small></small>
                                <p class="mb-0">{{$item->message}}</p>
                            </div>
                            @else
                            <div class="p-3 ml-auto my-1 text-right rounded text-white py-2" style="background-color: #262D31;">
                                <small>{{$item->username}} <small class="ml-2 text-muted">{{$item->created_at}}</small></small>
                                <p class="mb-0">{{$item->message}}</p>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="bg-light p-3">
                        <form class="d-flex" method="POST" action="{{route('message.store')}}">
                            @csrf
                            <input type="hidden" name='id_user' value="{{$id}}" />
                            <input type="text" class="form-control mr-3" placeholder="enter your mesage here" name="message">
                            <button class="btn btn-success" type="submit">
                                Send
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
