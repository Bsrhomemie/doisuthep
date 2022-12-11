<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Doisuthep_db;
use Illuminate\Http\Request;
use DB;
use Validator;
use Response;

class PlantController extends Controller
{
    /**
     * check if data is correct
     *
     * @return validator
     */
    public function validatoraAdd(Request $request){
        $validator = Validator::make(
            $request->all(), [
            'name' => 'required',
            'common_name' => 'required',
            'scientific_name' => 'required'
        ]);
        return $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('doisuthep_dbs')
        ->Join('plants', 'plants.doisuthep_db_id', '=', 'doisuthep_dbs.id')
        ->where('doisuthep_dbs.type', '=', 'plant')
        ->get();
        // return Response::json(array('data' => $data));
        return Response::json(array('data' => $data), 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);

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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
        ]);
        $show = Game::create($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function edit(Plant $plant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plant $plant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plant)
    {
        //
    }
}
