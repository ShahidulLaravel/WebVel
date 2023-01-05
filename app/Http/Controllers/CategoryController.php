<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function category(){
        return view('admin.category.category');
    }

    function category_store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            'category_img' => ['image'],
        ]);
        Category::insert([
            'category_name'=> $request->category_name
        ]);
        return back()->with('success', 'Category Added Successfully');
    }
}
