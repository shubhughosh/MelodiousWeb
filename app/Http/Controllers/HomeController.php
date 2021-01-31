<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;
use App\Models\Queue;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data['artist'] = Artist::all();
        $data['album'] = Album::all();
        $data['track'] = Track::where('language_type','!=','Bengali')->get();
        $data['selected_track'] = Track::where('language_type','=','Bengali')->get();
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
        return view("player_work.layout",$data);

    }

    // public function pauseStatus(Request $request,$id)
    // {
    //     $t = Track::find($id);
    //     $t->status = 1;
    //     $t->save();
    //     return redirect()->back();
    // }
    // public function playStatus(Request $request,$id)
    // {
    //     $t = Track::find($id);
    //     $t->status = 0;
    //     $t->save();
    //     return redirect()->back();
    // }

    public function addQueueData($id)
    {
        $data['track'] = Track::where('id','=',$id)->get();
        foreach($data['track'] as $trk);

        $queue = new Queue();
        $queue->track_id = $trk->id;
        $queue->name = $trk->name;
        $queue->song = $trk->song;
        $queue->save();
        return redirect()->back();
    }

    public function removeQueueData($id)
    {
        $queue = Queue::where('track_id',$id);
        $queue->delete();
        return redirect()->back();
    }

    public function allTracks(Request $request)
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
        if ($request->artist_name) {
            $data['alltracks'] = Track::where('singer','=',$request->artist_name)->get();
            $data['artist_profile'] = Artist::where('artist_name','=',$request->artist_name)->get();
            return view("player_work.artist_allTracks",$data);
        }
        else {
            $data['alltracks'] = Track::where('singer','=',$request->singer)->get();
            $data['artist_profile'] = Artist::where('artist_name','=',$request->singer)->get();
            return view("player_work.artist_allTracks",$data);
        }

    }

    public function albums(Request $request)
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
        if ($request->album_name) {
            $data['alltracks'] = Track::where('album_name','=',$request->album_name)->get();
            $data['album_cover'] = Album::where('album_name','=',$request->album_name)->get();
            return view("player_work.albums_allTracks",$data);
        }
        else {
            $data['alltracks'] = Track::where('album_name','=',$request->album_name)->get();
            $data['album_cover'] = Album::where('album_name','=',$request->album_name)->get();
            return view("player_work.albums_allTracks",$data);
        }

    }
}
