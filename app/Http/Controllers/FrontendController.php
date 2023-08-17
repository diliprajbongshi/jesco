<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Thumbnail;
use App\Models\Wishlisht;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
        return view('frontend.index',[
            'products'=>Product::all(),
            'categories'=>Category::where('status','show')->get(),
            "count_category"=>Category::count(),
        ]);
    }
    function productdetails($slug) {
      
          
        $wishlist_status = Wishlisht::where('user_id',auth()->id())->where('product_id',Product::where('slug',$slug)->first()->id)->exists();
        if($wishlist_status){
            $wishlist_id = Wishlisht::where('user_id',auth()->id())->where('product_id',Product::where('slug',$slug)->first()->id)->first()->id;
        }else{
            $wishlist_id ="";
        }
         $related_products =  Product::where('slug','!=',$slug)->where('category_id',Product::where('slug',$slug)->firstOrFail()->category_id)->get();
         return view('product.productDetails',[
            'related_products'=>$related_products,
            'product_details'=>Product::where('slug',$slug)->firstOrFail(),
            'thumbnails'=>Thumbnail::all(),
            'wishlist_status'=>$wishlist_status,
            'wishlist_id'=>$wishlist_id,
            'reviews'=>Rating::where('product_id',Product::where('slug',$slug)->firstOrFail()->id)->get()
         ]);
    }
    public function category_product($category_id){
        return view('product.categorywiseproduct',[
            'all_products'=>Product::count(),
            'category_name'=>Category::find($category_id)->category_name,
            'products'=>Product::where('category_id',$category_id)->get()
        ]);
    }
}
