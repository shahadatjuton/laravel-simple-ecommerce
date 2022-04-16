<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

//    public function subCategory(){
//        return $this->belongsTo(SubCategory::class);
//    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }
}
