<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller

{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __construct()
	{
			$this->middleware('auth');
	}
    
    public function viewProtuct($id='')
    {
    
        if(empty($id)) {
            return view('product.create');
        } else {
            $product = Product::where('id', $id)->first();
            return view('product.edit', compact('product'));
        }
       
    }

    public function addProtuct(Request $request)
    {   
    
        $data = $request->input();
        $data_product = new Product;
        $data_product->name_th = $data['name_th'];
        $data_product->name_en = $data['name_en'];
        $data_product->price = $data['price'];
        $data_product->status = $data['status'];
 

        if($request->file()) {
            $service_image = $request->file('picture');
            $name_gen = hexdec(uniqid());

            $img_ext = strtolower($service_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;

            $upload_location =  'image/services/';
            $full_path =  $upload_location.$img_name ;
          
            $service_image ->move($upload_location,  $img_name);

            $data_product->picture = $full_path;
        }
    
        $data_product->save();
        return redirect('/admin/product')->with('status',"Insert successfully");

    }


    public function editProduct(Request $request)
    {  

        $data = $request->input();
        $data_product = Product::find($data['id']);
        $data_product->name_th = $data['name_th'];
        $data_product->name_en = $data['name_en'];
        $data_product->price = $data['price'];
        $data_product->status = $data['status'];

        if($request->file()) {
            $fileName = time().'_'.$request->file('picture')->getClientOriginalName();
            $request->file('picture')->storeAs('/public', $fileName);
            $data_product->picture = $fileName;
        }
        if($request->file()) {
            $service_image = $request->file('picture');
            if($service_image) {
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($service_image->getClientOriginalExtension());
                $img_name = $name_gen.'.'.$img_ext;


                $upload_location =  'image/services/';
                $full_path =  $upload_location.$img_name ;
            
                $data_product->picture = $full_path;

                //delete 
                $old_file = $data['old_file'];
                if($old_file) {
                    unlink($old_file);
                }
                $service_image ->move($upload_location,  $img_name);
            }
        }

        $data_product->update();
        return redirect('/admin/product')->with('status',"Update successfully");

    }


    public function deleteProduct(Request $request)
    {  
         $data = $request->input();
        $data_product = Product::find($data['id']);
        $file = $data['file'];
        if($file) {
            unlink($file);
        }
        $data_product->delete();
        return redirect('/admin/product')->with('status',"Delete successfully");

    }
    
}
