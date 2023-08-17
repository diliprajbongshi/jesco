<?php

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

function wishlish(){
    return App\Models\Wishlisht::where('user_id',auth()->id())->get();
}
function wishlishcheck($product_id){
    return App\Models\Wishlisht::where('user_id',auth()->id())->where('product_id',$product_id)->exists();
}
function cartlisht(){
    return App\Models\Cart::where('user_id',auth()->id())->get();
}
function cart_count(){
    return App\Models\Cart::where('user_id',auth()->id())->count();
}
function getVendorName($product_id){
    return App\Models\User::find(Product::find($product_id)->vendor_id)->name;
    // return App\Models\Cart::where('user_id',auth()->id())->count();
}
function getStockout($product_id){
    return App\Models\Product::find($product_id)->product_quantity;
}
function how_many_reviews($product_id){
    if( Rating::where('product_id',$product_id)->count() >= 2){
        return Rating::where('product_id',$product_id)->count().'Reviews';
    }else{
        return Rating::where('product_id',$product_id)->count().'Review';
    }
}
function how_many_percentage($product_id){
     return Rating::where('product_id',$product_id)->avg('rating')* 20;
}
// function find_product(Request $request){
//     return Product::where('name',$request->name)->get();
// }

