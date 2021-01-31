@extends('player_work.base')
@section('content')
    <div class="container-fluid p-4">
        <small style="font-size: 15px; font-weight:bolder">Albums</small>
        <div class="row mt-3">
            @foreach ($albums as $album)
            <div class="col-lg-2 mb-4">
                <a href="{{route('albums',['album_name'=>$album->album_name])}}" class="nav-link p-0 m-0">
                    <div class="card border-0 shadow-sm mb-1">
                        <img src="{{asset('album_cover/'.$album->image)}}" class="card-img">
                    </div>
                    <small class="text-white">{{ $album->album_name }}</small>
                </a>
            </div>
            @endforeach
        </div>
    </div>


@endsection
