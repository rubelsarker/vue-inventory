<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json(['customers' => $customers]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'phone'       => 'required'
        ]);
        $photo = $request->photo;
        if($photo){
            $position = strpos($photo,';');
            $sub = substr($photo, 0, $position);
            $ext = explode('/',$sub)[1];
            $imageName = time().".".$ext;
            $upload_path = 'upload/customer';
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
            'photo'         => $image_url
        ];
        Customer::create($data);
    }

    public function show($id)
    {
        $row = Customer::findOrFail($id);
        return response()->json(['row' => $row]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'phone'       => 'required'
        ]);
        $row = Customer::findOrFail($id);
        $photo = $request->new_photo;
        if($photo){
            $position = strpos($photo,';');
            $sub = substr($photo, 0, $position);
            $ext = explode('/',$sub)[1];
            $imageName = time().".".$ext;
            $upload_path = 'upload/customer';
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
            'photo'         => $image_url
        ];
        Customer::where('id',$id)->update($data);
    }

    public function destroy($id)
    {
        $row = Customer::findOrFail($id);
        if(file_exists($row->photo)){
            unlink($row->photo);
        }
        $row->delete();
    }
}
