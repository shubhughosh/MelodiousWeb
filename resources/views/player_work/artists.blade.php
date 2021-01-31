@extends('player_work.base')
@section('content')
    <div class="container-fluid p-4">
        <small style="font-size: 15px; font-weight:bolder">Featured Artists</small>
        <div class="row mt-3">
            @foreach ($artists as $artist)
            <div class="col-lg-2 mb-4">
                <a href="{{route('allTracks',['artist_name'=>$artist->artist_name])}}" class="nav-link p-0 m-0">
                    <div class="card border-0 shadow-sm mb-1">
                        <img src="{{asset('artist_profile/'.$artist->profile)}}" class="card-img">
                    </div>
                    <small class="text-white">{{ $artist->artist_name }}</small>
                </a>
            </div>
            @endforeach
        </div>
    </div>


@endsection
