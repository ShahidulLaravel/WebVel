<?php

namespace App\Models;

use App\Http\Controllers\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected  $guarded = ['id'];
    
    function rel_to_category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
