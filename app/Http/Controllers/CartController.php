<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Wishlisht;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addCart($wish_id){
         $vendor_id = Product::find(Wishlisht::find($wish_id)->product_id)->vendor_id;

         if(Cart::where('user_id',auth()->id())->where('product_id',Wishlisht::find($wish_id)->product_id)->exists()){
            Cart::where('user_id',auth()->id())->where('product_id',Wishlisht::find($wish_id)->product_id)->increment('amount',1);
         }else{
            Cart::insert([
                'user_id' => auth()->id(),
                'vendor_id' => $vendor_id,
                'product_id' => Wishlisht::find($wish_id)->product_id,
                'created_at' =>Carbon::now()
            ]);
         }
        
         Wishlisht::find($wish_id)->delete();
         return back();
    }
    function add_to_cart(Request $request,$product_id){
        if(Product::find($product_id)->product_quantity < $request->qtybutton){
            return back()->with('stock_out','Stock not available');
        }else{
            if(Cart::where('user_id',auth()->id())->where('product_id',$product_id)->exists()){
                if(Product::find($product_id)->product_quantity < Cart::where('user_id',auth()->id())->where('product_id',$product_id)->first()->amount + $request->qtybutton){
                    return back()->with('stock_out','All ready in the cart');
                }else{
                    Cart::where('user_id',auth()->id())->where('product_id',$product_id)->increment('amount',$request->qtybutton);
                }
             }else{
                Cart::insert([
                    'user_id' => auth()->id(),
                    'vendor_id' =>  Product::find($product_id)->vendor_id,
                    'product_id' => $product_id,
                    'amount'=>$request->qtybutton,
                    'created_at' =>Carbon::now()
                ]);
             }
        }
         return back();
    }

    function view_cart(){
      if(isset($_GET['coupon_name'])){
            if($_GET['coupon_name']){
                $coupon_name = $_GET['coupon_name'];
              
               if( Coupon::where('coupon_name',$_GET['coupon_name'])->exists()){
                    if(Coupon::where('coupon_name',$_GET['coupon_name'])->first()->limit != 0){
                        //  $discount = 180; 
                        $validity_data = Coupon::where('coupon_name',$_GET['coupon_name'])->first()->validity;
                        if($validity_data < Carbon::today()->format('Y-m-d')){
                            $discount = 0; 
                            return back()->with('err',$coupon_name.' this coupon date is over');
                        }else{
                            $discount = (session('cart_total') * Coupon::where('coupon_name',$_GET['coupon_name'])->first()->discount_percentage)/100;
                        }
                       
                    }else{
                        return back()->with('err',$coupon_name.' this coupon limit is over');
                    }
                
               }else{
                  return back()->with('err',$coupon_name.' this coupon is not in the record');
               }
            }else{
                $coupon_name = "";
                $discount = 0;
            }
      }else{
          $coupon_name = "";
          $discount = 0;
      }
        return view('frontend.cart',compact('discount','coupon_name'));
    }
    function clear_shopping_card($user_id){
         Cart::where('user_id',$user_id)->delete();
         return back();
    }
    function single_cart($id){
        Cart::find($id)->delete();
        return back();
    }
    function updatecart (Request $request){
        foreach($request->qtybutton as $cart_id=>$qtybutton ){
             $product_id = Cart::find($cart_id)->product_id;
             $product_name =  Product::find($product_id)->name;
             $product_only =  Product::find($product_id)->product_quantity;
            if(Product::find($product_id)->product_quantity < $qtybutton ){
                 return back()->with('stock_err'," $product_name, This Product Available :".$product_only);
            }else{
                    Cart::find($cart_id)->update([
                        'amount'=>$qtybutton
                    ]);
            }
        
        }
        return back();
        
    }
}
