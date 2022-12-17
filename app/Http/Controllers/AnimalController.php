<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Doisuthep_db;
use App\Models\Picture;
use DB;
use Validator;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File; 

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

    public function indexAdmin()
    {
        $type_text = 'ฐานข้อมูลสัตว์';
        $type= 'animals';
        $list_data = DB::table('doisuthep_dbs')
            ->Join('animals', 'animals.doisuthep_db_id', '=', 'doisuthep_dbs.id')
            ->where('doisuthep_dbs.type', '=', 'animal')
            ->paginate(5);
        foreach ($list_data as $key => $data) {
            $temp_files = [];
            $files = Picture::where('doisuthep_db_id', $data->doisuthep_db_id)->get(); 
            
            foreach ($files as $key => $file) {
                $temp_files[] = $file;
            }
            $data->files = $temp_files;
        }
        return view('admin.animal', compact('type', 'type_text', 'list_data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_text = 'ฐานข้อมูลสัตว์';
        $type= 'animals';
        return view('animal.create', compact('type', 'type_text'));
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
            return redirect('/admin/database/animals')->with('status',$validator->errors());
        }

        //name exist?
        if ($this->isHaveName($request->name)) {
            return redirect('/admin/database/animals')->with('status',"already have animal name in System.");
        }

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
            if($request->file()) {
                foreach ($request->file() as $key => $file) {
                    $service_image = $request->file($key);
                    $name_gen = hexdec(uniqid());
                    $img_ext = strtolower($service_image->getClientOriginalExtension());
                    $img_name = $name_gen.'.'.$img_ext;
                    $upload_location =  'public/image/services/';
                    $full_path =  $upload_location.$img_name ;
                    $service_image ->move(base_path($upload_location),  $img_name);
                    
                    $data_file = new Picture;
                    $data_file->pic_location = $full_path;
                    $data_file->doisuthep_db_id = $doisuthep->id;
                    $data_file->save();
                }
            }

            // \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollBack();
            return redirect('/admin/database/animals')->with('status',"create doisuthep is err .");
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
            return redirect('/admin/database/animals')->with('status',$e);
        }

        \DB::commit();

        return redirect('/admin/database/animals')->with('status',"Created Animal Successfully");
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        $type_text = 'ฐานข้อมูลสัตว์';
        $type= 'animals';
        $data = DB::table('doisuthep_dbs')
            ->Join('animals', 'animals.doisuthep_db_id', '=', 'doisuthep_dbs.id')
            ->where('doisuthep_dbs.type', '=', 'animal')
            ->where('animals.id', '=', $animal->id)
            ->first();
        $temp_files = [];
        $files = Picture::where('doisuthep_db_id', $data->doisuthep_db_id)->get(); 
        foreach ($files as $key => $file) {
            $temp_files[] = $file;
        }
        $data->files = $temp_files;
        return view('animal.edit', compact('type', 'type_text', 'data'));
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

        // try {
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
                ->where('animals.id', '=', $request->id)
                ->update($get_doi_id);


                if($request->file()) {
                    foreach ($request->file() as $key => $file) {
                        if($request['is_update'][$key] == 1){
                            $old_file = $request['old_file'][$key];
                            if(File::exists(base_path($old_file))) {
                                File::delete(base_path($old_file));
                            }
        
                            $service_image = $request->file($key);
                            $name_gen = hexdec(uniqid());
                            $img_ext = strtolower($service_image->getClientOriginalExtension());
                            $img_name = $name_gen.'.'.$img_ext;
                            $upload_location =  'public/image/services/';
                            $full_path =  $upload_location.$img_name ;
                            $service_image ->move(base_path($upload_location),  $img_name);
                            
                            $data_file =  Picture::where('doisuthep_db_id',$request->doisuthep_db_id)->where('pic_location', $old_file)->first();
                            if($data_file){
                                $data_file->pic_location = $full_path;
                                $data_file->update();
                            }else{
                                $data_add_file = new Picture;
                                $data_add_file->pic_location = $full_path;
                                $data_add_file->doisuthep_db_id  = $request->doisuthep_db_id;
                                $data_add_file->save();
                            }
                        }
                            
                    }
                }
            // \DB::commit();
        // } catch (\Throwable $e) {
        //     \DB::rollBack();
        //     return redirect('/admin/database/animals')->with('status',"update doisuthep is err .");
        // }

        \DB::commit();
        return redirect('/admin/database/animals')->with('status',"Updated Animal Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        \DB::beginTransaction();

        try {
        $data_file =  Picture::where('doisuthep_db_id',$request->doisuthep_db_id)->get();
        foreach ($data_file as $key => $file) {
            $file = $file['pic_location'];
            if(File::exists(base_path($file))) {
                File::delete(base_path($file));
            }
        } 
        DB::table('doisuthep_dbs')
            ->where('id', '=', $request->doisuthep_db_id)
            ->delete();
        } catch (\Throwable $e) {
            \DB::rollBack();
            return redirect('/admin/database/animals')->with('status',"delete animal is err .");
    }

         \DB::commit();
        return redirect('/admin/database/animals')->with('status',"Delete Animal Successfully");
    }
}
