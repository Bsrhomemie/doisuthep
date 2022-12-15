<?php

namespace App\Http\Controllers;

use App\Models\Doisuthep_db;
use Illuminate\Http\Request;
use Response;
use DB;
class DoisuthepDBController extends Controller
{
    public function search(Request $request)
    {

        $search = $request->input();
        if (isset($search['type'])) {
            echo 10;
        } else {
            $results = DB::table('doisuthep_dbs')
                ->where('name', 'like', "%{$search['search']}%")
                ->orWhere('common_name', 'like', "%{$search['search']}%")
                ->orWhere('local_name', 'like', "%{$search['search']}%")
                ->orWhere('scientific_name', 'like', "%{$search['search']}%")
                ->get();
            $data=json_decode($results, true);

            // return view("doisuthep.index", compact("data"));
            // return Response::json(array('data' => $data));
            // return Response::json(
            //     array('data' => $results),
            //     200,
            //     array('Content-Type' => 'application/json;charset=utf8'),
            //     JSON_UNESCAPED_UNICODE
            // );
            return $data[0]['type'];
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Doisuthep_db  $doisuthep_db
     * @return \Illuminate\Http\Response
     */
    public function show(Doisuthep_db $doisuthep_db)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doisuthep_db  $doisuthep_db
     * @return \Illuminate\Http\Response
     */
    public function edit(Doisuthep_db $doisuthep_db)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doisuthep_db  $doisuthep_db
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doisuthep_db $doisuthep_db)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doisuthep_db  $doisuthep_db
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doisuthep_db $doisuthep_db)
    {
        //
    }
}
