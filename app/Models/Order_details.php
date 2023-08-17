<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    use HasFactory;

    public function relation_user(){
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }
    
    public function relation_product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
