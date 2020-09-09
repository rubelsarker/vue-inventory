<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->get();
        return response()->json(['products' => $products]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id'    => 'required',
            'supplier_id'    => 'required',
            'product_name'   => 'required',
            'quantity'       => 'required'
        ],
            [
                'category_id.required' => 'Select a category',
                'supplier_id.required' => 'Select a Supplier'
            ]);
        $photo = $request->product_image;
        if($photo){
            $position = strpos($photo,';');
            $sub = substr($photo, 0, $position);
            $ext = explode('/',$sub)[1];
            $imageName = time().".".$ext;
            $upload_path = 'upload/product';
            if (!File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            $img = Image::make($photo)->resize(240,200);
            $image_url = $upload_path . '/' . $imageName;
            $img->save($image_url);
        }
        else{
            $image_url = '';
        }
        $data = [
            'product_name'     => $request->product_name,
            'product_code'     => $request->product_code,
            'category_id'      => $request->category_id,
            'supplier_id'      => $request->supplier_id,
            'quantity'         => $request->quantity,
            'status'           => $request->status ? 1 : 0,
            'product_image'    => $image_url
        ];

        Product::create($data);
    }


    public function show($id)
    {
        $row = Product::where('id',$id)->with('category','supplier')->first();
        return response()->json(['row' => $row]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id'    => 'required',
            'supplier_id'    => 'required',
            'product_name'   => 'required',
            'quantity'       => 'required'
        ],
            [
                'category_id.required' => 'Select a category',
                'supplier_id.required' => 'Select a Supplier'
            ]);
        $row = Product::findOrFail($id);
        $photo = $request->new_product_image;
        if($photo){
            $position = strpos($photo,';');
            $sub = substr($photo, 0, $position);
            $ext = explode('/',$sub)[1];
            $imageName = time().".".$ext;
            $upload_path = 'upload/product';
            if (!File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            if(file_exists($row->product_image)){
                unlink($row->product_image);
            }
            $img = Image::make($photo)->resize(240,200);
            $image_url = $upload_path . '/' . $imageName;
            $img->save($image_url);
        }
        else{
            $image_url = $row->product_image;
        }
        $data = [
            'product_name'     => $request->product_name,
            'product_code'     => $request->product_code,
            'category_id'      => $request->category_id,
            'supplier_id'      => $request->supplier_id,
            'quantity'         => $request->quantity,
            'status'           => $request->status ? 1 : 0,
            'product_image'    => $image_url
        ];
        Product::where('id',$id)->update($data);
    }


    public function destroy($id)
    {
        $row = Product::findOrFail($id);
        if(file_exists($row->product_image)){
            unlink($row->product_image);
        }
        $row->delete();
    }
}
