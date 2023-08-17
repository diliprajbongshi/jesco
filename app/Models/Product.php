<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_img'];
    public function relation_to_category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
