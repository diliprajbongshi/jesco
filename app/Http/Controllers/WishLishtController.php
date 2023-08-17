<?php

namespace App\Http\Controllers;

use App\Models\Wishlisht;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WishLishtController extends Controller
{
    function insert($product_id) {
        Wishlisht::insert([
            'user_id'=>auth()->id(),
            'product_id'=>$product_id,
            'created_at'=>Carbon::now()
        ]);
        return back();
    }
    function wishlish_remove($wishlist_id){
        Wishlisht::find($wishlist_id)->delete();
        return back();
    }
    public function wishlish_view(){
        return view('Wishlish.index',[
            'wishlist'=>Wishlisht::where('user_id',auth()->id())->get()
        ]);
    }
    
}
