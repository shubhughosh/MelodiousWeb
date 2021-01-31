<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
// use Illuminate\Support\Collection;

class AlbumController extends Controller
{

    public function index()
    {
        $data['albums'] = Album::all();
        return view("player_work.albums",$data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'album_name'=>'required',
            'album_language_type'=>'required',
            'image'=>'required',
        ]);

        $filename = $request->album_name . "." . $request->image->extension();
        $request->image->move(public_path("album_cover"),$filename);
        $album = new Album();
        $album->album_name = $request->album_name;
        $album->album_language_type = $request->album_language_type;
        $album->image = $filename;
        $album->save();

        return redirect()->route('index');
    }


    public function show(Album $album)
    {
        //
    }


    public function edit(Album $album)
    {
        //
    }


    public function update(Request $request, Album $album)
    {
        //
    }


    public function destroy(Album $album)
    {
        //
    }
}
