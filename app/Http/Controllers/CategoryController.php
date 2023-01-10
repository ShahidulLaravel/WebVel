<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    function category(){
        $all_category = Category::all();
        return view('admin.category.category', [
            'all_category' => $all_category
        ]);
    }

    function category_store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            'category_img' => ['required', 'image'],
        ]);
        if($request->category_img == null){
            Category::insert([
            'category_name' => $request->category_name,    
        ]);

        }else{
            $category_img = $request->category_img;
            $extension = $category_img->getClientOriginalExtension();
            $file_name = Str::lower(str_replace(' ', '-', $request->category_name)).'-'.rand(10,100000).'.'.$extension;

            Image::make($category_img)->save(public_path('upload/category/'.$file_name));

            Category::insert([
                'category_name' => $request->category_name,
                'category_img'  => $file_name
            ]);
        }
        return back()->with('success', 'Category Added Successfully');
    }

    public function category_delete($user_id){
        Category::find($user_id)->delete();
        return back()->with('deleted', 'Category Deleted Successfully');
    }
    
}
