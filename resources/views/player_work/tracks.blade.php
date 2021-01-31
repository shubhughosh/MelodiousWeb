@extends('player_work.base')
@section('content')
    <div class="container-fluid p-4">
        <small style="font-size: 15px; font-weight:bolder">All Tracks</small>
        <div class="row mt-3">
            @foreach ($tracks as $track)
            <div class="col-lg-2 mb-4">
                <a href="{{ route('track.index',['id'=>$track->id,'name'=>$track->name]) }}" class="nav-link p-0 m-0">
                    <div class="card border-0 shadow-sm mb-1">
                        <img src="{{asset('album_cover/'.$track->image)}}" class="card-img">
                    </div>
                    <small class="text-white">{{ $track->name }}</small>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="fixed-bottom" style="background: rgb(212,175,175);
    background: linear-gradient(-90deg, rgb(146, 142, 142) 0%, rgba(47,56,82,1) 76%);">
        <div class="container-fluid px-5 py-3">
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
                                    <a href="{{ route('track.index',['id'=>$bq->track_id,'name'=>$bq->name]) }}"><i class="fas fa-step-backward" id="icon_design"></i></a>
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

                            @endif

                            @if (isset($queue_data)&&count($queue_data)>0)
                                @foreach ($queue_data as $qd)
                                    <a href="{{ route('track.index',['id'=>$qd->track_id,'name'=>$qd->name]) }}"><i class="fas fa-step-forward" id="icon_design"></i></a>
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
                                }
                            </script>

                            <a class="ms-2" onclick="document.getElementById('player').volume -= 0.5"><i class="fas fa-volume-down" id="icon_design"></i></a>
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
        </div>
    </div>
@endsection
