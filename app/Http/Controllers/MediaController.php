<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use shweshi\LaravelUnsplashWrapper\UnsplashSearch;
use function MongoDB\BSON\toJSON;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $query
     * @return \Illuminate\Http\Response
     */

    public static function index(Request $request)
    {
    }


    public static function search(Request $request)
    {
        $unsplashSearch = new UnsplashSearch();
        return $unsplashSearch->photos($request->search_text, ["en"]);
    }

    public static function addImage(Request $request)
    {
//        $unsplashSearch = new UnsplashSearch();
//        return $unsplashSearch->photos($request->search_text, ["en"]);

        $data = json_decode($request->image);
        $id = $data->id;
        $alt = $data->alt_description;
        $url = $data->urls->full;
        $success = Media::create([$id, $alt, $url]);
        echo "here ".$success." Ends";
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Media $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Media $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Media $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Media $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }
}
