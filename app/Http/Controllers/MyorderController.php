<?php

namespace App\Http\Controllers;

use App\Models\Order_details;
use App\Models\Order_summary;
use App\Models\Rating;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
class MyorderController extends Controller
{
    public function my_orders(){
        return view('myorder.myorder',[
           'order_summaries' =>Order_summary::where('user_id',auth()->id())->get()
        ]);
    }
    public function invoice(){
        $data = 'Dilip';
        $pdf = Pdf::loadView('pdf.invoice',compact('data'));
        return $pdf->stream('invoice.pdf');
    }
    public function orderdetails($id){

        $order_summaries =  Order_summary::find(Crypt::decryptString($id));
        $order_details =  Order_details::where('order_summary_id',Crypt::decryptString($id))->get();
        $product_id =  Order_details::where('order_summary_id',Crypt::decryptString($id))->first()->product_id;
        // $rating =  Rating::where('user_id',auth()->id())->where('product_id',$product_id)->first();
        // if($rating){
        //     $rating =  Rating::where('user_id',auth()->id())->where('product_id',$product_id)->first()->rating;
        // }else{
        //     $rating = "";
        // }
        return view('myorder.index',[
           'order_summaries'=>$order_summaries,
           'order_details'=>$order_details,
        //    'rating'=>$rating,
        ]);
    }
    public function all_orders(){
        return view('myorder.all_orders',[
            'order_summaries'=>Order_summary::all(),
        ]);
    }
    public function mark_as_received($id){
       Order_summary::find($id)->update([
            'delivered_status' => 1
       ]);
       return back();
    }
    public function rating(Request $request,$id){
       Rating::insert([
        'user_id'=>auth()->id(),
        'product_id'=>Order_details::find($id)->product_id,
        'order_details_id'=>$id,
        'rating'=>$request->rating3,
        'review'=>$request->review,
         'created_at'=>Carbon::now()
       ]);
       return back();
        
    }
}
