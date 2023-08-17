<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlisht extends Model
{
    use HasFactory;

    function relation_product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
