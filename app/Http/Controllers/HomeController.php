<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if(strpos(url()->previous(),"product/details")){
            return redirect(url()->previous());
        }
        return view('home');
    }
    function location(){
        return view('frontend.location',[
            'countries' => Country::get(['id','name'])
        ]);
    }
    function add_location(Request $request){
        foreach($request->countries as $country_id){
             Country::find($country_id)->update([
                   'status'=>'active'
             ]);
        }
        return back();
    }
    function location_list(){
        return view('frontend.location_list',[
            'active_location'=> Country::where('status','active')->paginate(5)
        ]);
    }
    function edit_country($country_id){
        return view('frontend.edit_location',[
            'counrty_info' => Country::find($country_id)
        ]);
    }
    function  update_country(Request $request,$country_id){
        Country::find($country_id)->update([
             'status' => $request->status
        ]);
        return back();
    }
}
