@extends('player_work.base')

@section('content')

    <div class="container-fluid p-4">

        <small style="font-size: 15px; font-weight:bolder">Trending Songs</small>
        <div class="row mt-2">
            @foreach ($selected_track as $strk)
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <img src="{{asset('album_cover/'.$strk->image)}}" class="card-img"
                        height="255">
                    <div class="card-img-overlay">
                        <h6 class="card-title">
                            {{$strk->name}}
                        </h6>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-8">
                <div id="slide1" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row p-4">
                                @foreach ($track as $trk)
                                <div class="col-3">
                                    <a href="{{ route('index',['id'=>$trk->id,'name'=>$trk->name]) }}" class="nav-link p-0 m-0">
                                        <div class="card border-0 shadow-sm mb-1">
                                            <img src="{{asset('album_cover/'.$trk->image)}}" class="card-img">
                                        </div>
                                        <small class="text-white">{{ $trk->name }}</small>

                                    </a>
                                </div>

                                @if($loop->iteration%4==0)
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row p-4">
                                @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <a class="carousel-control-prev nav-link" href="#slide1" role="button" data-bs-slide="prev">
                        <p style="margin-right: 120%; font-size:25px;">&laquo;</p>
                    </a>
                    <a class="carousel-control-next nav-link" href="#slide1" role="button" data-bs-slide="next">
                        <p style="margin-left: 120%; font-size:25px;">&raquo;</p>
                    </a>
                </div>

                <a href="{{route('track.index')}}" class="btn btn-sm shadow-none float-end border-0 bg-white" style="border-radius:100px;"><b><small>View All &raquo;</small></b></a>
            </div>
        </div>

        <hr>

        <small style="font-size: 15px; font-weight:bolder">Featured Artists</small>
        <div class="row mt-2">
            <div class="col-lg-12">
                <div id="slide2" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row p-3">
                                @foreach ($artist as $art)
                                <div class="col-2">
                                    <a href="{{route('allTracks',['artist_name'=>$art->artist_name])}}" class="nav-link p-0 m-0">
                                        <div class="card border-0 shadow-sm mb-1">
                                            <img src="{{asset('artist_profile/'.$art->profile)}}" class="card-img">
                                        </div>
                                        <small class="text-white">{{$art->artist_name}}</small>
                                    </a>
                                </div>
                                @if($loop->iteration%6==0)
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row p-3">
                                @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <a class="carousel-control-prev nav-link" href="#slide2" role="button" data-bs-slide="prev">
                        <p style="margin-right: 120%; font-size:25px;">&laquo;</p>
                    </a>
                    <a class="carousel-control-next nav-link" href="#slide2" role="button" data-bs-slide="next">
                        <p style="margin-left: 120%; font-size:25px;">&raquo;</p>
                    </a>
                </div>

                <a href="{{route('artist.index')}}" class="btn btn-sm shadow-none float-end border-0 bg-white" style="border-radius:100px;"><b><small>View All &raquo;</small></b></a>
            </div>
        </div>

        <hr>

        <small style="font-size: 15px; font-weight:bolder">Albums</small>
        <div class="row mt-2">
            <div class="col-lg-12">
                <div id="slide3" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row p-3">
                                @foreach ($album as $abm)
                                <div class="col-2">
                                    <a href="{{route('albums',['album_name'=>$abm->album_name])}}" class="nav-link p-0 m-0">
                                        <div class="card border-0 shadow-sm mb-1">
                                            <img src="{{ asset('album_cover/'.$abm->image) }}" class="card-img">
                                        </div>
                                        <small class="text-white">{{ $abm->album_name }}</small>
                                    </a>
                                </div>
                                @if($loop->iteration%6==0)
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row p-3">
                                @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <a class="carousel-control-prev nav-link" href="#slide3" role="button" data-bs-slide="prev">
                        <p style="margin-right: 120%; font-size:25px;">&laquo;</p>
                    </a>
                    <a class="carousel-control-next nav-link" href="#slide3" role="button" data-bs-slide="next">
                        <p style="margin-left: 120%; font-size:25px;">&raquo;</p>
                    </a>
                </div>

                <a href="{{route('album.index')}}" class="btn btn-sm shadow-none float-end border-0 bg-white" style="border-radius:100px;"><b><small>View All &raquo;</small></b></a>
            </div>
        </div>

    </div><br><br><br>


    <div class="fixed-bottom" style="background: rgb(212,175,175);
    background: linear-gradient(-90deg, rgb(146, 142, 142) 0%, rgba(47,56,82,1) 76%);">
        <div class="container-fluid px-5 py-3">
                {{-- <audio class="" preload="none" style="background-color:#292b2c;width:35%" controls>
                    <source src="{{ url("tracks/Tujh Mein Rab.mp3") }}" type="audio/mpeg">
                </audio> --}}
                {{-- <audio controls src="{{ url("tracks/Tujh Mein Rab.mp3") }}"></audio> --}}

            @if(count($song_play)>0)
            @foreach ($song_play as $sgp)
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-1">
                            <div class="card shadow-sm border-0">
                                <img src="{{asset('album_cover/'.$sgp->image)}}" class="card-img" style="height:40px;">
                            </div>
                        </div>
                        <div class="col-lg-2 mt-2">
                            <b><small>{{$sgp->name}}</small></b>
                        </div>
                        <div class="col-lg-9 mt-1">

                            <audio id="player" src="{{ url("tracks/".$sgp->song) }}" ontimeupdate="timeUpdate()"></audio>
                            @if (isset($backward_queue)&&count($backward_queue)>0)
                                @foreach ($backward_queue as $bq)
                                    <a href="{{ route('index',['id'=>$bq->track_id,'name'=>$bq->name]) }}"><i class="fas fa-step-backward" id="icon_design"></i></a>
                                @endforeach
                            @else
                            <i class="fas fa-step-backward" style="font-size: 17px;color:rgb(146, 136, 136);margin: 7px;"></i>
                            @endif

                            @if ($sgp->name==request()->name)
                            <script>
                                window.onload = function()
                                {
                                    document.getElementById('player').play();

                                    if(player.paused){
                                        document.getElementById("playpausebtn").innerHTML = "<i class='fas fa-play' id='icon_design'></i>";
                                    }
                                    else{
                                        document.getElementById("playpausebtn").innerHTML = "<i class='fas fa-pause' id='icon_design'></i>";
                                    }
                                }
                                function playPause(){
                                    if(player.paused){
                                        player.play();
                                        playpausebtn.innerHTML = "<i class='fas fa-pause' id='icon_design'></i>";
                                    }
                                    else {
                                        player.pause();
                                        playpausebtn.innerHTML = "<i class='fas fa-play' id='icon_design'></i>";
                                    }
                                }
                            </script>

                            <a onclick="playPause()" id="playpausebtn"></a>

                            {{-- <a onclick="document.getElementById('player').play();"><i class="fas fa-play" id="icon_design"></i></a> --}}
                            @endif

                            @if (isset($queue_data)&&count($queue_data)>0)
                                @foreach ($queue_data as $qd)
                                    <a href="{{ route('index',['id'=>$qd->track_id,'name'=>$qd->name]) }}"><i class="fas fa-step-forward" id="icon_design"></i></a>
                                @endforeach
                            @else
                            <i class="fas fa-step-forward" style="font-size: 17px;color:rgb(146, 136, 136);margin: 7px;"></i>
                            @endif
                            <input class="ms-2" type="range" min="1" max="100" value="0" step="1" style="width:55%;cursor:pointer" id="customRange">


                            <script>
                                function timeUpdate(){
		                            customRange.value = player.currentTime * (100 / player.duration);

                                    var curmins = Math.floor(player.currentTime / 60);
                                    var cursecs = Math.floor(player.currentTime - curmins * 60);
                                    var durmins = Math.floor(player.duration / 60);
                                    var dursecs = Math.floor(player.duration - durmins * 60);
                                    if(cursecs < 10){
                                        cursecs = "0"+cursecs;
                                    }
                                    if(dursecs < 10){
                                        dursecs = "0"+dursecs;
                                    }
                                    if(curmins < 10){
                                        curmins = "0"+curmins;
                                    }
                                    if(durmins < 10){
                                        durmins = "0"+durmins;
                                    }
                                    curtime.innerHTML = curmins+":"+cursecs;
                                    duration.innerHTML = durmins+":"+dursecs;

                                    // var b = Math.floor(a.currentTime) + ' / ' + Math.floor(a.duration);
                                    // document.getElementById('tracktime').innerHTML = b;
                                }
                            </script>


                            {{-- <p id="demo" class="text-white"></p>
                            <script>

                                window.onload = function() {
                                    var x = document.getElementById("player").duration;
                                    document.getElementById("demo").innerHTML = x;
                                }

                            </script> --}}

                            <a class="ms-2" onclick="document.getElementById('player').volume -= 0.5"><i class="fas fa-volume-down" id="icon_design"></i></a>
                            {{-- <a onclick="document.getElementById('player')"><i class="fas fa-volume-mute" id="icon_design"></i></a> --}}
                            <a onclick="document.getElementById('player').volume += 0.5"><i class="fas fa-volume-up" id="icon_design"></i></a>
                            <a href="{{url('tracks/'.$sgp->song)}}" download class="bg-danger bg-gradient p-2" style="border-radius: 10px"><i class="fas fa-download text-white"></i></a>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4 p-0">
                    <div class="row">
                        <div class="col-lg-3 mt-2 p-0">
                            <b id="curtime" class="small">00:00</b> <b class="m-1">|</b> <b id="duration" class="small">00:00</b>
                        </div>
                        <div class="col-lg-1 p-0 mt-2 me-2">
                            <div class="dropdown">
                                <a class="" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v text-dark"></i>
                                </a>

                                <ul class="dropdown-menu">
                                  <li>
                                    @if (count($queue)>0)
                                    <a class="dropdown-item text-info" href="{{route('removeQueueData',$sgp->id)}}"><i class="fas fa-stream fa-sm text-info me-1"></i> Remove to queue</a>
                                    @else
                                    <a class="dropdown-item" href="{{route('addQueueData',$sgp->id)}}"><i class="fas fa-stream fa-sm text-secondary me-1"></i> Add in queue</a>
                                    @endif
                                  </li>
                                  <li><a class="dropdown-item" href="#"><i class="fas fa-share-alt fa-sm text-secondary me-1"></i> Share link</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6 m-0 p-0">
                            @if (isset($queue_data))
                                @foreach ($queue_data as $qd)
                                <div class="card p-2 border-0 shadow-sm" style="background-color: rgba(146, 142, 142);">
                                    <small class="text-dark"><b><span class="text-danger"><i class="fas fa-music fa-xs"></i> Next track</span> <span class="text-white">:</span> <span class="text-uppercase">{{$qd->name}}</span></b></small>
                                </div>
                                @endforeach
                            @else
                            @foreach ($inqueue as $inq)
                                <div class="card p-2 border-0 shadow-sm" style="background-color: rgba(146, 142, 142);">
                                    <small class="text-dark"><b><span class="text-danger"><i class="fas fa-music fa-xs"></i> In Queue</span> <span class="text-white">:</span> <span class="text-uppercase">{{$inq->name}}</span></b></small>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <marquee direction="up"><i class="fas fa-grin-hearts"></i> Play any song I am ready to launch the media player</marquee>
            @endif

            {{-- <div>
                <button onclick="document.getElementById('player').play()">Play</button>
                <button onclick="document.getElementById('player').pause()">Pause</button>
                <button onclick="document.getElementById('player').volume += 0.1">Vol +</button>
                <button onclick="document.getElementById('player').volume -= 0.1">Vol -</button>
            </div> --}}
        </div>
    </div>



{{-- ::::::::::::::::::::::::::::::::::::Models::::::::::::::::::::::::::::::::::::::::::::: --}}


<div class="modal fade" id="add_artist">
    <div class="modal-dialog modal-fullscreen-xxl-down">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="staticBackdropLabel">Add Artist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <form action="{{route('artist.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="small text-muted m-0 p-0">Artist Name</label>
                                            <input type="text" class="shadow-none form-control form-control-sm" name="artist_name">
                                            @error('artist_name')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="small text-muted m-0 p-0">Image (<span class="text-success small"><strong>For your profile</strong></span>)</label>
                                            <input class="form-control form-control-sm shadow-none" name="profile" type="file" id="formFile">
                                        </div>
                                        <div class="mb-4">
                                            <label class="small text-muted m-0 p-0">Select Genres</label>
                                            <select name="genres" class="shadow-none form-control form-control-sm">
                                                <option selected disabled>Select Genres</option>
                                                <option value="Bollywood Songs">Bollywood Songs</option>
                                                <option value="Romantic Songs">Romantic Songs</option>
                                                <option value="Devotional Songs">Devotional Songs</option>
                                                <option value="Ghazals">Ghazals</option>
                                                <option value="Bhajan">Bhajan</option>
                                                <option value="Kids Songs">Kids Songs</option>
                                                <option value="Love Songs">Love Songs</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-sm w-100 shadow-none btn-success">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="create_new_album">
    <div class="modal-dialog modal-fullscreen-xxl-down">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="staticBackdropLabel">Album Creation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <form action="{{route('album.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="small text-muted m-0 p-0">Album Name</label>
                                            <input type="text" class="shadow-none form-control form-control-sm" name="album_name">
                                            @error('album_name')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="small text-muted m-0 p-0">Select language</label>
                                            <select name="album_language_type" class="shadow-none form-control form-control-sm">
                                                <option selected disabled>Select language</option>
                                                <option value="Bengali">Bengali</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="English">English</option>
                                                <option value="Gujarati">Gujarati</option>
                                                <option value="Punjabi">Punjabi</option>
                                                <option value="Haryanvi">Haryanvi</option>
                                                <option value="Tamil">Tamil</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="small text-muted m-0 p-0">Album cover</label>
                                            <input class="form-control form-control-sm shadow-none" name="image" type="file" id="formFile">
                                        </div>

                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-sm w-100 shadow-none btn-success">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="new_track">
    <div class="modal-dialog modal-fullscreen-xxl-down">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="staticBackdropLabel">New Track</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <form action="{{route('track.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="small text-muted m-0 p-0">Song Name</label>
                                            <input type="text" class="shadow-none form-control form-control-sm" name="name">
                                            @error('song_name')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="small text-muted m-0 p-0">Genres</label>
                                            <select name="genres" class="shadow-none form-control form-control-sm">
                                                <option selected disabled>Select Genres</option>
                                                <option value="Bollywood Songs">Bollywood Songs</option>
                                                <option value="Romantic Songs">Romantic Songs</option>
                                                <option value="Devotional Songs">Devotional Songs</option>
                                                <option value="Ghazals">Ghazals</option>
                                                <option value="Bhajan">Bhajan</option>
                                                <option value="Kids Songs">Kids Songs</option>
                                                <option value="Love Songs">Love Songs</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="small text-muted m-0 p-0">Album Name</label>
                                            <select name="album_name" class="shadow-none form-control form-control-sm">
                                                <option selected disabled>Select Album</option>
                                                @foreach ($album as $albm)
                                                    <option value="{{$albm->album_name}}">{{$albm->album_name}} (Lang: {{$albm->album_language_type}} )</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="small text-muted m-0 p-0">Artist</label>
                                            <select name="singer" class="shadow-none form-control form-control-sm">
                                                <option selected disabled>Select Artist</option>
                                                @foreach ($artist as $art)
                                                    <option value="{{$art->artist_name}}">{{$art->artist_name}} (Genres: {{$art->genres}} )</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="small text-muted m-0 p-0">Select language</label>
                                            <select name="language_type" class="shadow-none form-control form-control-sm">
                                                <option selected disabled>Select language</option>
                                                <option value="Bengali">Bengali</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="English">English</option>
                                                <option value="Gujarati">Gujarati</option>
                                                <option value="Punjabi">Punjabi</option>
                                                <option value="Haryanvi">Haryanvi</option>
                                                <option value="Tamil">Tamil</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="small text-muted m-0 p-0">Upload song</label>
                                            <input class="form-control form-control-sm shadow-none" name="song" type="file" id="formFile">
                                        </div>

                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-sm w-100 shadow-none btn-success">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- ::::::::::::::::::::::::::::::::::::End Model:::::::::::::::::::::::::::::::::::::::::: --}}

@endsection
