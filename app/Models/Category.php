<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function categoryType(){
        return $this->belongsTo(CategoryType::class);
    }
    public function subCategories(){
        return $this->hasMany(SubCategory::class);
    }
}
