<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    function category(){
        $all_category = Category::all();
        $trash_category = Category::onlyTrashed()->get();
        return view('admin.category.category', [
            'all_category' => $all_category,
            'trash_category' => $trash_category
        ]);
    }

    function category_insert(Request $request){
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

    public function category_edit($user_id){
        $category_info = Category::find($user_id);
        return view('admin.category.category_edit',[
            'category_info' => $category_info,
        ]);
    }

    public function category_update(Request $request){
        
        if($request->category_img == ''){
            Category::find($request->category_id)->update([
                'category_name' => $request->category_name
            ]);

        }else{
            //delete previous
            $present_img = Category::find($request->category_id);
            $delete_from = public_path('upload/category/'. $present_img->category_img);
            unlink($delete_from);
            //update category
            $category_img = $request->category_img;
            $extension = $category_img->getClientOriginalExtension();
            $file_name = Str::lower(str_replace(' ', '-', $request->category_name)) . '-' . rand(10, 100000) . '.' . $extension;
            Image::make($category_img)->save(public_path('upload/category/'. $file_name));
            //update image and category name
            Category::find($request->category_id)->update([
                'category_name' => $request->category_name,
                'category_img'  => $file_name
            ]);

        }
        return back()->with('edit_success', 'Category Edited Successfully');
    }

    public function category_restore($restore_id){
        Category::onlyTrashed()->find($restore_id)->restore();
        return back()->with('trash_deleted', 'Category Restore Successfully');      
    }

    public function category_per_del($delete_id){
        //delete previous
        $present_img = Category::onlyTrashed()->find($delete_id);
        $delete_from = public_path('upload/category/' . $present_img->category_img);
        unlink($delete_from);
        Category::onlyTrashed()->find($delete_id)->forceDelete();
        return back()->with('trash_p_deleted', 'Category is Permanently Deleted');
    }

    public function category_check_del(Request $request){
        foreach($request->category_id as $category){
            Category::find($category)->delete();
        };
        return back();
    }

    public function category_check_res(Request $request){
        foreach($request->trash as $restore_all){
            Category::onlyTrashed()->find($restore_all)->restore();
        }
        return back();
    }
    
}
