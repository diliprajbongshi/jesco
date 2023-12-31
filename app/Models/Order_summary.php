<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_summary extends Model
{
    use HasFactory;
    protected $fillable = ['delivered_status'];
    function relation_users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
