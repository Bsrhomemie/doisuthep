<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Picture;
use App\Models\Doisuthep_db;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
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
        $type_text = 'ฐานข้อมูลพืช';
        $type= 'plants';
        $list_data = DB::table('doisuthep_dbs')
            ->Join('plants', 'plants.doisuthep_db_id', '=', 'doisuthep_dbs.id')
            ->where('doisuthep_dbs.type', '=', 'plant')
            ->paginate(5);

        return view('admin.plant', compact('type', 'type_text', 'list_data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function indexAdmin()
    {
        $type_text = 'ฐานข้อมูลพืช';
        $type= 'plants';
        $list_data = DB::table('doisuthep_dbs')
            ->Join('plants', 'plants.doisuthep_db_id', '=', 'doisuthep_dbs.id')
            ->where('doisuthep_dbs.type', '=', 'plant')
            ->paginate(5);
        foreach ($list_data as $key => $data) {
            $temp_files = [];
            $files = Picture::where('doisuthep_db_id', $data->doisuthep_db_id)->get(); 
            
            foreach ($files as $key => $file) {
                $temp_files[] = $file;
            }
            $data->files = $temp_files;
        }
        return view('admin.plant', compact('type', 'type_text', 'list_data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_text = 'ฐานข้อมูลพืช';
        $type= 'plants';
        return view('plant.create', compact('type', 'type_text'));
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
            return redirect('/admin/database/plants')->with('status',"already have plant name in System.");
        }
        
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
            return redirect('/admin/database/plants')->with('status',"create doisuthep is err .");
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
            return redirect('/admin/database/plants')->with('status',$e);
        }

        \DB::commit();
        return redirect('/admin/database/plants')->with('status',"Insert successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plant)
    {
        $type_text = 'ฐานข้อมูลพืช';
        $type= 'plants';
        $data = DB::table('doisuthep_dbs')
            ->Join('plants', 'plants.doisuthep_db_id', '=', 'doisuthep_dbs.id')
            ->where('doisuthep_dbs.type', '=', 'plant')
            ->where('plants.id', '=', $plant->id)
            ->first();
        $temp_files = [];
        $files = Picture::where('doisuthep_db_id', $data->doisuthep_db_id)->get(); 
        foreach ($files as $key => $file) {
            $temp_files[] = $file;
        }
        $data->files = $temp_files;
        return view('plant.edit', compact('type', 'type_text', 'data'));
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
                ->where('plants.id', '=', $request->id)
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
        } catch (\Throwable $e) {
            \DB::rollBack();
            return redirect('/admin/database/plants')->with('status',"update doisuthep is err .");
        }

        \DB::commit();
        return redirect('/admin/database/plants')->with('status',"Updated Plant Successfully");
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plant  $plant
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
            return redirect('/admin/database/plants')->with('status',"delete plant is err .");
        }
        
         \DB::commit();
        return redirect('/admin/database/plants')->with('status',"Delete Plant Successfully");
    }
}
