<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Doisuthep_db;
use DB;
use Validator;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Schema;

class AnimalController extends Controller
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
     * check if search is exist
     *
     * @return validator
     */
    public function validatorSearch(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'search' => 'required'
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
    public function index(Request $request)
    {
        // validator search
        $validator = $this->validatorSearch($request);
        if ($validator->errors()->any()) { // no search
            $data = DB::table('doisuthep_dbs')
                ->Join('animals', 'animals.doisuthep_db_id', '=', 'doisuthep_dbs.id')
                ->where('doisuthep_dbs.type', '=', 'animal')
                ->paginate(5);
            // return Response::json(array('data' => $data));
            return Response::json(array('data' => $data), 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
        } else { // have search
            $columns = Schema::getColumnListing('animals');
            $data = DB::table('doisuthep_dbs')
                ->Join('animals', 'animals.doisuthep_db_id', '=', 'doisuthep_dbs.id')
                ->where('doisuthep_dbs.type', '=', 'animal');
            foreach($columns as $column){
                if($column == 'id'){
                    continue;
                }
                $data->orWhere($column, 'LIKE', '%' . $request->search . '%');
            }
            $data=$data->get();
            // return Response::json(array('data' => $data));
            return Response::json(array('data' => $data), 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
        }
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
            return response()->json("already have animal name in System.")
                ->setStatusCode(400, 'failed');
        }

        if ($request->type == 'animal') {
            \DB::beginTransaction();

            // insert doisuthep with type
            try {

                $doisuthep = new Doisuthep_db();
                $doisuthep->name = $request->name;
                $doisuthep->type = 'animal';
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
                $animal = new Animal();
                $animal->kingdom = $request->kingdom ?: '';
                $animal->phylum = $request->phylum ?: '';
                $animal->class = $request->class ?: '';
                $animal->order = $request->order ?: '';
                $animal->family = $request->family ?: '';
                $animal->genus = $request->genus ?: '';
                $animal->species = $request->species ?: '';
                $animal->characteristics_th  = $request->characteristics_th ?: '';
                $animal->characteristics_en  = $request->characteristics_en ?: '';
                $animal->behavior_th = $request->behavior_th ?: '';
                $animal->behavior_en = $request->behavior_en ?: '';
                $animal->habitat_th = $request->habitat_th ?: '';
                $animal->habitat_en = $request->habitat_en ?: '';
                $animal->food_th = $request->food_th ?: '';
                $animal->food_en = $request->food_en ?: '';
                $animal->conservation_status_th = $request->conservation_status_th ?: '';
                $animal->conservation_status_en = $request->conservation_status_en ?: '';
                $animal->references_th = $request->references_th ?: '';
                $animal->references_en = $request->references_en ?: '';
                $animal->doisuthep_db_id = $doisuthep->id;
                $animal->save();
                // \DB::commit();
            } catch (\Throwable $e) {
                \DB::rollBack();
                return response()->json($e)
                    ->setStatusCode(400, 'failed');
            }

            \DB::commit();

            return response()->json("Created Animal Successfully")
                ->setStatusCode(200, 'success');
        }
        return response()->json("Input wrong type")
            ->setStatusCode(400, 'failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        $data = DB::table('doisuthep_dbs')
            ->Join('animals', 'animals.doisuthep_db_id', '=', 'doisuthep_dbs.id')
            ->where('doisuthep_dbs.type', '=', 'animal')
            ->where('animals.id', '=', $animal->id)
            ->get();

        return response()->json(array('data' => $data), 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE)->setStatusCode(200, 'success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {

        \DB::beginTransaction();

        try {
            $get_doi_id = [
                'doisuthep_dbs.name' => $request->name,
                'doisuthep_dbs.common_name' => $request->common_name,
                'doisuthep_dbs.local_name' => $request->local_name,
                'doisuthep_dbs.scientific_name' => $request->scientific_name,
                'doisuthep_dbs.updated_at' => DB::raw("CURRENT_TIMESTAMP"),
                'animals.kingdom' => $request->kingdom,
                'animals.phylum' => $request->phylum,
                'animals.class' => $request->class,
                'animals.order' => $request->order,
                'animals.family' => $request->family,
                'animals.genus' => $request->genus,
                'animals.species' => $request->species,
                'animals.characteristics_th' => $request->characteristics_th,
                'animals.characteristics_en' => $request->characteristics_en,
                'animals.behavior_th' => $request->behavior_th,
                'animals.behavior_en' => $request->behavior_en,
                'animals.habitat_th' => $request->habitat_th,
                'animals.habitat_en' => $request->habitat_en,
                'animals.food_th' => $request->food_th,
                'animals.food_en' => $request->food_en,
                'animals.conservation_status_th' => $request->conservation_status_th,
                'animals.conservation_status_en' => $request->conservation_status_en,
                'animals.references_th' => $request->references_th,
                'animals.references_en' => $request->references_en
            ];
            DB::table('doisuthep_dbs')
                ->Join('animals', 'animals.doisuthep_db_id', '=', 'doisuthep_dbs.id')
                ->where('doisuthep_dbs.type', '=', 'animal')
                ->where('animals.id', '=', $animal->id)
                ->update($get_doi_id);

            // \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollBack();
            return response()->json(array($e, "update doisuthep is err ."))
                ->setStatusCode(400, 'failed');
        }

        \DB::commit();

        return response()->json("Updated Animal Successfully")
            ->setStatusCode(200, 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        \DB::beginTransaction();

        try {
            DB::table('doisuthep_dbs')
                ->Join('animals', 'animals.doisuthep_db_id', '=', 'doisuthep_dbs.id')
                ->where('doisuthep_dbs.type', '=', 'animal')
                ->where('animals.id', '=', $animal->id)
                ->delete();
        } catch (\Throwable $e) {
            \DB::rollBack();
            return response()->json(array($e, "delete animal is err ."))
                ->setStatusCode(400, 'failed');
        }

        return \DB::commit();
    }
}
