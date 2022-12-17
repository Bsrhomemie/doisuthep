<?php

namespace App\Http\Controllers;

use App\Models\Doisuthep_db;
use Illuminate\Http\Request;
use Response;
use DB;
use Schema;

class DoisuthepDBController extends Controller
{
    public function search(Request $request)
    {   
        $search = $request->input();
        if(!isset($search['type']) && !isset($search['search'])) {
            return view('database', ['database_list' => []]);
        }
        if (isset($search['type'])) {
            if ($search['type'] == 'plant') {
                $columns = Schema::getColumnListing('plants');
                $data = DB::table('doisuthep_dbs')
                    ->Join('plants', 'plants.doisuthep_db_id', '=', 'doisuthep_dbs.id')
                    ->where('doisuthep_dbs.type', '=', 'plant')
                    ->orWhere('name', 'like', "%{$search['search']}%")
                    ->orWhere('common_name', 'like', "%{$search['search']}%")
                    ->orWhere('local_name', 'like', "%{$search['search']}%")
                    ->orWhere('scientific_name', 'like', "%{$search['search']}%");
                foreach ($columns as $column) {
                    if ($column == 'id') {
                        continue;
                    }
                    $data->orWhere('plants.' . $column, 'LIKE', '%' . $search['search'] . '%');
                }
            } elseif ($search['type'] == 'animal') {
                $columns = Schema::getColumnListing('animals');
                $data = DB::table('doisuthep_dbs')
                    ->Join('animals', 'animals.doisuthep_db_id', '=', 'doisuthep_dbs.id')
                    ->where('doisuthep_dbs.type', '=', 'animal')
                    ->orWhere('name', 'like', "%{$search['search']}%")
                    ->orWhere('common_name', 'like', "%{$search['search']}%")
                    ->orWhere('local_name', 'like', "%{$search['search']}%")
                    ->orWhere('scientific_name', 'like', "%{$search['search']}%");
                foreach ($columns as $column) {
                    if ($column == 'id') {
                        continue;
                    }
                    $data->orWhere('animals.' . $column, 'LIKE', '%' . $search['search'] . '%');
                }
                
            }
            $data->paginate(15);
            $res_data = compact('data');
            dd( $res_data);

            return view('database', ['database_list' => $res_data]);
        } else {
            $results = DB::table('doisuthep_dbs')
                ->where('name', 'like', "%{$search['search']}%")
                ->orWhere('common_name', 'like', "%{$search['search']}%")
                ->orWhere('local_name', 'like', "%{$search['search']}%")
                ->orWhere('scientific_name', 'like', "%{$search['search']}%")
                ->get();
            $data = json_decode($results, true);
            dd( $data);

            if ($data[0]['type'] == 'animal') {
                $returndata = DB::table('doisuthep_dbs')
                    ->Join('plants', 'plants.doisuthep_db_id', '=', 'doisuthep_dbs.id')
                    ->where('doisuthep_dbs.type', '=', 'plant')
                    ->paginate(12);
            } elseif ($data[0]['type'] == 'plant') {
                $returndata = DB::table('doisuthep_dbs')
                    ->Join('animals', 'animals.doisuthep_db_id', '=', 'doisuthep_dbs.id')
                    ->where('doisuthep_dbs.type', '=', 'animal')
                    ->paginate(12);
            }
            $res_data = compact('returndata');
            dd( $res_data);
            return view('database', ['database_list' => $res_data]);
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
