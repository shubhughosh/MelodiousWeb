<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Track;
use Illuminate\Http\Request;

class ArtistController extends Controller
{

    public function index()
    {
        $data['artists'] = Artist::all();
        return view("player_work.artists",$data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'artist_name'=>'required',
            'profile'=>'required',
            'genres'=>'required'
        ]);

        $filename = $request->artist_name . "." . $request->profile->extension();
        $request->profile->move(public_path("artist_profile"),$filename);
        $artist = new Artist();
        $artist->artist_name = $request->artist_name;
        $artist->profile = $filename;
        $artist->genres = $request->genres;
        $artist->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        //
    }
}
