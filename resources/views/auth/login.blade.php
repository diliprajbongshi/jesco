@extends('layouts.app_auth')
@section('content')

<div class="card">
    <div class="card-block">

        <div class="account-box">

            <div class="card-box p-5">
                <h2 class="text-uppercase text-center pb-4">
                    <a href="" class="text-success">
                        <span><img src="{{asset('dashboard/assets/images/logo.png')}}" alt="" height="26"></span>
                    </a>
                </h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group m-b-20 row">
                        <div class="col-12">
                            <label for="emailaddress">Email address</label>
                            <input class="form-control" type="email" id="emailaddress" name="email" placeholder="Enter your email">
                            @error('email')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-b-20">
                        <div class="col-12">
                            
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
                            @error('password')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-b-20">
                        <div class="col-12">

                            <div class="checkbox checkbox-custom">
                                <input id="remember" type="checkbox" >
                                <label for="remember">
                                    Remember me
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group row text-center m-t-10">
                        <div class="col-12">
                            <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign In</button>
                        </div>
                    </div>
                    <div class="form-group row text-center m-t-10">
                        <div class="col-6">
                            <a class="btn btn-block bg-dark waves-effect waves-light bg-black text-white" href="{{route('github.redirect')}}">Sign in with Github</a>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-block btn-custom waves-effect waves-light" href="{{route('google.redirect')}}">Sign In with Google</a>
                        </div>
                    </div>

                </form>

                <div class="row m-t-50">
                    <div class="col-sm-12 text-center">
                        <a href="page-recoverpw.html" class="text-muted pull-right"><small>Forgot your password?</small></a>
                        <p class="text-muted">Don't have an account? <a href="{{route('register')}}" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection