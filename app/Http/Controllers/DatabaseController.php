<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewDatabase($type, $id = '')
    {

        $type_list = [
            'plants' => 'ฐานข้อมูลพืช',
            'animal' => 'ฐานข้อมูลสัตว์',
        ];
        $type = $type;
        $type_text = isset($type_list[$type]) ? $type_list[$type] : '';
        $type_database = ['data_plants', 'data_animal'];
        if (empty($id)) {
            return view('database.edit', compact('type', 'type_text'));
        } else {
            $content = Post::where('id', $id)->first();
            return view('database.edit', compact('type', 'type_text', 'content'));
        }
    }


    public function addDatabase(Request $request)
    {
        $type_list = [
          'plants' => 1,
          'animal' => 2,
        ];

        $data = $request->input();
        $data_post = new Post;
        $data_post->post_name_th = $data['post_name_th'];
        $data_post->content_th = $data['content_th'];
        $data_post->post_name_en = $data['post_name_en'];
        $data_post->content_en = $data['content_en'];
        $data_post->created_at = $data['created_at'];
        $data_post->post_type = isset($type_list[$data['post_type']]) ? $type_list[$data['post_type']] : '';

        $data_post->pdf = '';
        if ($request->file()) {
            $service_image = $request->file('picture');
            $name_gen = hexdec(uniqid());

            $img_ext = strtolower($service_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;

            $upload_location =  'image/services/';
            $full_path =  $upload_location . $img_name;

            $service_image->move($upload_location,  $img_name);

            $data_post->picture = $full_path;
            $data_post->uniqid = $name_gen;
        }

        $data_post->save();
        return redirect('/admin/database/' . $data['post_type'])->with('status', "Insert successfully");
    }

    public function editDatabase(Request $request)
    {

        $data = $request->input();
        $data_post = Post::find($data['id']);
        $data_post->post_name_th = $data['post_name_th'];
        $data_post->content_th = $data['content_th'];
        $data_post->post_name_en = $data['post_name_en'];
        $data_post->content_en = $data['content_en'];
        $data_post->created_at = $data['created_at'];

        $data_post->pdf = '';
        if ($request->file()) {
            $service_image = $request->file('picture');
            if ($service_image) {
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($service_image->getClientOriginalExtension());
                $img_name = $name_gen . '.' . $img_ext;


                $upload_location =  'image/services/';
                $full_path =  $upload_location . $img_name;

                $data_post->picture = $full_path;
                $data_post->uniqid = $name_gen;

                //delete 
                $old_file = $data['old_file'];
                if ($old_file) {
                    unlink($old_file);
                }
                $service_image->move($upload_location,  $img_name);
            }
        }

        $data_post->update();
        return redirect('/admin/database/' . $data['post_type'])->with('status', "Update successfully");
    }

    public function deleteDatabase(Request $request)
    {
        $data = $request->input();
        $data_post = Post::find($data['id']);
        $data_post->delete();
        //delete 
        $file = $data['file'];
        if ($file) {
            unlink($file);
        }
        return redirect('/admin/database/' . $data['post_type'])->with('status', "Delete successfully");
    }
}
