<?php

namespace App\Http\Controllers;

use App\Models\Billing_details;
use App\Models\Cart;
use App\Models\City;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Order_details;
use App\Models\Order_summary;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    function checkcout(){
      $countries = Country::where('status','active')->get(['id','name']);
     
       if(strpos(url()->previous(),'cart') || strpos(url()->previous(),'checkcout')){
        return view('frontend.checkout',[
          'countries'=>$countries,
         
        ]);
       }else{
         abort(404);
       }
    }
    function checkout_cart(Request $request){
        $request->validate([
          '*'=>'required',
        ]);
         
         $order_id =  Order_summary::insertGetId([
         'user_id'=>auth()->id(),
         'cart_total'=>session('cart_total'),
         'coupon_name'=>session('coupon_name'),
         'discount_total'=> session('discount'),
         'sub_total'=>session('cart_total') - session('discount'),
         'grand_total'=>session('total'),
         'shipping'=>session('shipping'),
         'payment_option'=>$request->payment,
         'created_at'=>Carbon::now()
         ]);

         Billing_details::insert([
         'order_summary_id'=>$order_id,
         'name'=>$request->name,
         'email'=>$request->email,
         'phone'=>$request->phone,
         'country_id'=>$request->country,
         'city_id'=>$request->city,
         'address'=>$request->address,
         'postcode'=>$request->postcode,
         'notes'=>$request->message,
         'created_at'=>Carbon::now()
         ]);

           foreach(cartlisht() as $cart){
               Order_details::insert([
                'order_summary_id'=>$order_id,
                'vendor_id'=>$cart->vendor_id,
                'product_id'=>$cart->product_id,
                'amount'=>$cart->amount,
                'created_at'=>Carbon::now()
               ]);

            //  Product table decrement 
            Product::find($cart->product_id)->decrement('product_quantity',$cart->amount);
            // Cart table decrement 
            Cart::find($cart->id)->delete();

           }

         if(session('coupon_name')){
           Coupon::where('coupon_name',session('coupon_name'))->decrement('limit',1);
         }


        if($request->payment == 1){
          return redirect('/home');
        }else{
          Session::put('order_id', $order_id);
          return redirect('pay');
        }
    }


 

    function getCity(Request $request){
        $string_to_show = "";
        foreach( City::where('country_id',$request->country_id)->get() as $city){;
          $string_to_show .= "<option value='$city->id'>$city->name</option>";
        }
        echo $string_to_show;
    }
}
