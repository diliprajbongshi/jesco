<?php

namespace App\Http\Controllers;

use App\Mail\EmailSend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Image;
class ProfileController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }
    public function index(){
        return view('profile');
    }
    public function profile_name(Request $request){
        $request->validate([
           'name'=>'required'
        ]);
        User::find(Auth::id())->update([
            'name'=>$request->name,
        ]);
        return back()->with('sucess','Name change successfully');
    }
    public function profile_changepassword(Request $request)
    {
        $request->validate([
           'old_password'=>'required',
           'password'=>'required|min:6',
           'password_confirm'=>'required'
        ]);
        if(Hash::check($request->old_password,Auth::user()->password)){
             if($request->password == $request->password_confirm){
                User::find(Auth::id())->update([
                   'password'=>$request->password
                ]);
                return back()->with('sucess_p','Your password updated successfully');
             }else{
                return back()->withErrors("Your password and confirm password does not match");
             }
        }else{
            return back()->withErrors("Your old password does not match the current password");
        }
    }
    public function profile_changephoto(Request $request)
    {
         $request->validate([
            'profile'=>'required|image'
         ]);
         if(Auth::user()->profile != 'default.png'){
            unlink(base_path('public/uploads/profile/'.Auth::user()->profile)) ;
         }
         $photo = Auth::id().'.'.$request->file('profile')->getClientOriginalExtension();
          
         Image::make($request->file('profile'))->resize(400, 400)->save(base_path('public/uploads/profile/'.$photo));
            
         User::find(Auth::id())->update([
            'profile' => $photo
         ]);

        return back()->with('photo','Photo change successfully');
         
        // if(Auth::user()->profile == 'default.png'){
            
        //     $photo = Auth::id().'.'.$request->file('profile')->getClientOriginalExtension();
          
        //      Image::make($request->file('profile'))->resize(400, 400)->save(base_path('public/uploads/profile/'.$photo));
                
        //      User::find(Auth::id())->update([
        //         'profile' => $photo
        //      ]);

        //     return back();
        // }else{
        //     unlink(base_path('public/uploads/profile/'.Auth::user()->profile)) ;
        //     $photo = Auth::id().'.'.$request->file('profile')->getClientOriginalExtension();
        //     Image::make($request->file('profile'))->resize(400, 400)->save(base_path('public/uploads/profile/'.$photo));
                
        //      User::find(Auth::id())->update([
        //         'profile' => $photo
        //      ]);
        //      return back();
        // }
    }
    public function user_list()
    {
         $users = User::where('role',1)->paginate(3);
         return view('user_list',[
            'users'=>$users
         ]);
    }
   
}
