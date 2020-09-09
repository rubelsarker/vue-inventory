<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{

    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json(['suppliers' => $suppliers]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'phone'       => 'required',
            'address'     => 'required'
        ]);
        $photo = $request->photo;
        if($photo){
            $position = strpos($photo,';');
            $sub = substr($photo, 0, $position);
            $ext = explode('/',$sub)[1];
            $imageName = time().".".$ext;
            $upload_path = 'upload/supplier';
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
            'name'          => $request->name,
            'email'         => $request->email,
            'address'       => $request->address,
            'nid_number'    => $request->nid_number,
            'phone'         => $request->phone,
            'shop_name'     => $request->shop_name,
            'photo'         => $image_url
        ];
        Supplier::create($data);
    }

    public function show($id)
    {
        $row = Supplier::findOrFail($id);
        return response()->json(['row' => $row]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'phone'       => 'required',
            'address'     => 'required'
        ]);
        $row = Supplier::findOrFail($id);
        $photo = $request->new_photo;
        if($photo){
            $position = strpos($photo,';');
            $sub = substr($photo, 0, $position);
            $ext = explode('/',$sub)[1];
            $imageName = time().".".$ext;
            $upload_path = 'upload/supplier';
            if (!File::exists($upload_path)) {
                File::makeDirectory($upload_path, $mode = 0777, true, true);
            }
            if(file_exists($row->photo)){
                unlink($row->photo);
            }
            $img = Image::make($photo)->resize(240,200);
            $image_url = $upload_path . '/' . $imageName;
            $img->save($image_url);
        }
        else{
            $image_url = $row->photo;
        }
        $data = [
            'name'          => $request->name,
            'email'         => $request->email,
            'address'       => $request->address,
            'nid_number'    => $request->nid_number,
            'phone'         => $request->phone,
            'shop_name'     => $request->shop_name,
            'photo'         => $image_url
        ];
        Supplier::where('id',$id)->update($data);
    }

    public function destroy($id)
    {
        $row = Supplier::findOrFail($id);
        if(file_exists($row->photo)){
            unlink($row->photo);
        }
        $row->delete();
    }
}
