<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'email'       => 'required',
            'joining_date'=> 'required'
        ]);
        $photo = $request->photo;
        if($photo){
            $position = strpos($photo,';');
            $sub = substr($photo, 0, $position);
            $ext = explode('/',$sub)[1];
            $imageName = time().".".$ext;
            $upload_path = 'upload/employee';
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
            'joining_date'  => $request->joining_date,
            'salary'        => $request->salary,
            'photo'         => $image_url
        ];
        Employee::create($data);
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
