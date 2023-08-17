<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponForm;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('coupon.index',[
            'coupons'=>Coupon::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponForm $request)
    {
        
         Coupon::insert($request->except('_token')+[
            'created_at'=>Carbon::now(),
         ]);
        // Coupon::insert([
        //     'coupon_name'=>$request->coupon_name, 
        //     'discount_percentage'=>$request->discount_percentage,
        //     'validity'=>$request->validity,
        //     'limit'=>$request->limit,
        //     'created_at'=>Carbon::now(),
        // ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
