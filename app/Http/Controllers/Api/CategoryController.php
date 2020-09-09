<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return response()->json(['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);
        $data = ['name' => $request->name];
        Category::create($data);
    }

    public function show($id)
    {
        $row = Category::findOrFail($id);
        return response()->json(['row' => $row]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id,
        ]);
        $row = Category::findOrFail($id);
        $data = [
            'name' => $request->name
        ];
        Category::where('id',$id)->update($data);
    }
    public function destroy($id)
    {
        $row = Category::findOrFail($id);
        $row->delete();
    }
}
