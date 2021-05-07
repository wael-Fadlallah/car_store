<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getParentCategoryAttribute($id){
        if($category = Category::find($id)){
            return __('lan.sub_category') . $category->name ;
        }else{
            return __('lan.main_category') ;
        }
    }

    // public function parent(){
    //     return $this->belongsTo(Category::class,'parent_category');
    // }
}
