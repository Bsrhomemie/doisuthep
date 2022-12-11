<?php

namespace App\Http\Controllers;

use App\Models\Homevideo;
use Illuminate\Http\Request;

class HomevideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editVideo(Request $request)
    {   
    
        $data = $request->input();

        for($i=1; $i<5;  $i++) {
            $data_video = Homevideo::find($i);
            $data_video->vdo_link = $data['url_'.$i];
            $data_video->position = $i;

            $data_video->update();
        }
        return redirect('/admin/video')->with('status',"Insert successfully");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Homevideo  $homevideo
     * @return \Illuminate\Http\Response
     */
    public function show(Homevideo $homevideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Homevideo  $homevideo
     * @return \Illuminate\Http\Response
     */
    public function edit(Homevideo $homevideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Homevideo  $homevideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homevideo $homevideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Homevideo  $homevideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Homevideo $homevideo)
    {
        //
    }
}
