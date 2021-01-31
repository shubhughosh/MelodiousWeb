<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\Album;
use App\Models\Queue;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['song_play'] = Track::where('name','=',$request->name)->get();
        $data['queue'] = Queue::where('track_id','=',$request->id)->get();


        $data['queue_filter'] = Queue::where('track_id',$request->id)->get();
        foreach($data['queue_filter'] as $qf);
        if(isset($qf->track_id)){
            $data['queue_data'] = Queue::where('track_id','!=',$request->id)->where('created_at','>',$qf->created_at)->take(1)->get();
            $data['backward_queue'] = Queue::where('track_id','!=',$request->id)->where('created_at','<',$qf->created_at)->take(1)->get();
        }
        else{
            $data['inqueue'] = Queue::take(1)->get();
        }
        $data['tracks'] = Track::all();
        return view("player_work.tracks",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'genres'=>'required',
            'album_name'=>'required',
            'singer'=>'required',
            'language_type'=>'required',
            'song'=>'required',
        ]);

        $filename = $request->name . "." . $request->song->extension();
        $request->song->move(public_path("tracks"),$filename);
        $track = new Track();
        $data['album'] = Album::where('album_name','=',$request->album_name)->get();
        foreach ($data['album'] as $abm);
        $track->name = $request->name;
        $track->genres = $request->genres;
        $track->album_name = $request->album_name;
        $track->singer = $request->singer;
        $track->language_type = $request->language_type;
        $track->image = $abm->image;
        $track->song = $filename;
        $track->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        //
    }
}
