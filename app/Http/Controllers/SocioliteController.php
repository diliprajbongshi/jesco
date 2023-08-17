<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SocioliteController extends Controller
{
    public function githubredirect(){
        return Socialite::driver('github')->redirect();
    }
    public function githubCallback(){
        // $password = Str::random(9);
        $user = Socialite::driver('github')->user();

        if(User::where('email',$user->getEmail())->exists()){
            Auth::attempt([
                'email'=> $user->getEmail(),
                'password'=> 123,
            ]);
            return redirect('home');
        }
        else{
           $gitUser = User::create([
              'name'=> $user->getName(),
              'email'=> $user->getEmail(),
              'password'=> bcrypt(123),
            ]);
            Auth::login($gitUser);
            return redirect('home');
        }
    }

    
    public function googleredirect(){
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback(){
        // $password = Str::random(9);
        $user = Socialite::driver('google')->user();

        if(User::where('email',$user->getEmail())->exists()){
            Auth::attempt([
                'email'=> $user->getEmail(),
                'password'=> 123,
            ]);
            return redirect('home');
        }
        else{
           $gitUser = User::create([
              'name'=> $user->getName(),
              'email'=> $user->getEmail(),
              'password'=> bcrypt(123),
            ]);
            Auth::login($gitUser);
            return redirect('home');
        }
    }
}
