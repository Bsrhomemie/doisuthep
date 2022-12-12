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
    public function validatoraAdd(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'type' => 'required',
                'common_name' => 'required',
                'scientific_name' => 'required'
            ]
        );
        return $validator;
    }

    /**
     * check if data is exist
     *
     * @return boolean 
     */
    public function isHaveName($name)
    {
        $dbname =  Doisuthep_db::where("name", $name);
        return $dbname->first() ? true : false;
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

        return response()->json(array('data' => $data), 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE)->setStatusCode(200, 'success');
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

        // validator required
        $validator = $this->validatoraAdd($request);
        if ($validator->errors()->any()) {
            return response()->json($validator->errors())
                ->setStatusCode(400, 'failed');
        }

        //name exist?
        if ($this->isHaveName($request->name)) {
            return response()->json("already have plant name in System.")
                ->setStatusCode(400, 'failed');
        }

        if ($request->type == 'plant') {
            \DB::beginTransaction();

            // insert doisuthep with type
            try {

                $doisuthep = new Doisuthep_db();
                $doisuthep->name = $request->name;
                $doisuthep->type = 'plant';
                $doisuthep->common_name = $request->common_name;
                if (isset($request->local_name)) {
                    $doisuthep->local_name = $request->local_name;
                } else {
                    $doisuthep->local_name = '';
                }

                $doisuthep->scientific_name = $request->scientific_name;
                $doisuthep->save();
                // \DB::commit();
            } catch (\Throwable $e) {
                \DB::rollBack();
                return response()->json("create doisuthep is err .")
                    ->setStatusCode(400, 'failed');
            }

            try {
                $plant = new Plant();
                $plant->kingdom = $request->kingdom ?: '';
                $plant->division = $request->division ?: '';
                $plant->class = $request->class ?: '';
                $plant->order = $request->order ?: '';
                $plant->family = $request->family ?: '';
                $plant->genus = $request->genus ?: '';
                $plant->species = $request->species ?: '';
                $plant->stem_th = $request->stem_th ?: '';
                $plant->stem_en = $request->stem_en ?: '';
                $plant->leaf_th = $request->leaf_th ?: '';
                $plant->leaf_en = $request->leaf_en ?: '';
                $plant->flower_th = $request->flower_th ?: '';
                $plant->flower_en = $request->flower_en ?: '';
                $plant->fruit_th = $request->fruit_th ?: '';
                $plant->fruit_en = $request->fruit_en ?: '';
                $plant->distribution_th = $request->distribution_th ?: '';
                $plant->distribution_en = $request->distribution_en ?: '';
                $plant->utilization_th = $request->utilization_th ?: '';
                $plant->utilization_en = $request->utilization_en ?: '';
                $plant->conservation_status_th = $request->conservation_status_th ?: '';
                $plant->conservation_status_en = $request->conservation_status_en ?: '';
                $plant->references_th = $request->references_th ?: '';
                $plant->references_en = $request->references_en ?: '';
                $plant->doisuthep_db_id = $doisuthep->id;
                $plant->save();
                // \DB::commit();
            } catch (\Throwable $e) {
                \DB::rollBack();
                return response()->json($e)
                    ->setStatusCode(400, 'failed');
            }

            \DB::commit();

            return response()->json("Created Plant Successfully")
                ->setStatusCode(200, 'success');
        }
        return response()->json("Input wrong type")
            ->setStatusCode(400, 'failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plant)
    {
        $data = DB::table('doisuthep_dbs')
            ->Join('plants', 'plants.doisuthep_db_id', '=', 'doisuthep_dbs.id')
            ->where('doisuthep_dbs.type', '=', 'plant')
            ->where('plants.id', '=', $plant->id)
            ->get();

        return response()->json(array('data' => $data), 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE)->setStatusCode(200, 'success');
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

        \DB::beginTransaction();

        try {
            $get_doi_id = [
                'doisuthep_dbs.name' => $request->name,
                'doisuthep_dbs.common_name' => $request->common_name,
                'doisuthep_dbs.local_name' => $request->local_name,
                'doisuthep_dbs.scientific_name' => $request->scientific_name,
                'doisuthep_dbs.updated_at' => DB::raw("CURRENT_TIMESTAMP"),
                'plants.kingdom' => $request->kingdom,
                'plants.division' => $request->division,
                'plants.class' => $request->class,
                'plants.order' => $request->order,
                'plants.family' => $request->family,
                'plants.genus' => $request->genus,
                'plants.species' => $request->species,
                'plants.stem_th' => $request->stem_th,
                'plants.stem_en' => $request->stem_en,
                'plants.leaf_th' => $request->leaf_th,
                'plants.leaf_en' => $request->leaf_en,
                'plants.flower_th' => $request->flower_th,
                'plants.flower_en' => $request->flower_en,
                'plants.fruit_th' => $request->fruit_th,
                'plants.fruit_en' => $request->fruit_en,
                'plants.distribution_th' => $request->distribution_th,
                'plants.distribution_en' => $request->distribution_en,
                'plants.utilization_th' => $request->utilization_th,
                'plants.utilization_en' => $request->utilization_en,
                'plants.conservation_status_th' => $request->conservation_status_th,
                'plants.conservation_status_en' => $request->conservation_status_en,
                'plants.references_th' => $request->references_th,
                'plants.references_en' => $request->references_en
            ];
            DB::table('doisuthep_dbs')
                ->Join('plants', 'plants.doisuthep_db_id', '=', 'doisuthep_dbs.id')
                ->where('doisuthep_dbs.type', '=', 'plant')
                ->where('plants.id', '=', $plant->id)
                ->update($get_doi_id);

            // \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollBack();
            return response()->json(array($e, "update doisuthep is err ."))
                ->setStatusCode(400, 'failed');
        }

        \DB::commit();

        return response()->json("Updated Plant Successfully")
            ->setStatusCode(200, 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plant)
    {
        \DB::beginTransaction();

        try {
            DB::table('doisuthep_dbs')
                ->Join('plants', 'plants.doisuthep_db_id', '=', 'doisuthep_dbs.id')
                ->where('doisuthep_dbs.type', '=', 'plant')
                ->where('plants.id', '=', $plant->id)
                ->delete();
        } catch (\Throwable $e) {
            \DB::rollBack();
            return response()->json(array($e, "delete plant is err ."))
                ->setStatusCode(400, 'failed');
        }
        
        return \DB::commit();
    }
}
