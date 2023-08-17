<?php

namespace App\Http\Controllers;

use App\Mail\VendorMail;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class VendorController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $random_num = Str::random(9);
  
       $user_info = User::create([
           'name'=>$request->name,
           'email'=>$request->vendor_email,
           'phone'=>$request->phone,
           'password'=>bcrypt($random_num),
           'role'=>3,
        ]);

        Vendor::insert([
           'user_id'=>$user_info->id,
           'address'=>$request->address,
           'created_at'=>Carbon::now()
        ]);
        Mail::to($request->vendor_email)->send(new VendorMail($random_num));
        return back();
  
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
