<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[HomeController::class,'index'])->name('index');
Route::get('/addQueueData/{id}',[HomeController::class,'addQueueData'])->name('addQueueData');
Route::get('/removeQueueData/{id}',[HomeController::class,'removeQueueData'])->name('removeQueueData');
Route::get('allTracks',[HomeController::class,'allTracks'])->name('allTracks');
Route::get('albums',[HomeController::class,'albums'])->name('albums');
// Route::get('/pauseStatus/{id}',[HomeController::class,'pauseStatus'])->name('pauseStatus');
// Route::get('/playStatus/{id}',[HomeController::class,'playStatus'])->name('playStatus');
Route::resource('album', AlbumController::class);
Route::resource('artist', ArtistController::class)->except(['create']);
Route::resource('track', TrackController::class);
Route::resource('queue', QueueController::class);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
