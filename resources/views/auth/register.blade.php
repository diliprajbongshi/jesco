@extends('layouts.app_auth')
@section('content')

<div class="card">
    <div class="card-block">

        <div class="account-box">

            <div class="card-box p-5">
                <h2 class="text-uppercase text-center pb-4">
                    <a href="index.html" class="text-success">
                        <span><img src="assets/images/logo.png" alt="" height="26"></span>
                    </a>
                </h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row m-b-20">
                        <div class="col-12">
                            <label for="username">Full Name <span class="text-danger">*</span></label>
                            <input class="form-control" name="name" type="text" id="username"  placeholder="Enter your name">
                            @error('name')
                              <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row m-b-20">
                        <div class="col-12">
                            <label for="username">Phone Number</label>
                            <input class="form-control" name="phone" type="text"  placeholder="Enter your phone number">
                            @error('phone')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                               
                        </div>
                    </div>

                    <div class="form-group row m-b-20">
                        <div class="col-12">
                            <label for="emailaddress">Email address <span class="text-danger">*</span></label>
                            <input class="form-control" name="email" type="email" id="emailaddress"  placeholder="Enter your email">
                            @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-b-20">
                        <div class="col-12">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input class="form-control" name="password" type="password" id="password" placeholder="Enter your password">
                           
                        </div>
                    </div>
                    <div class="form-group row m-b-20">
                        <div class="col-12">
                            <label for="password">Confirm Password  <span class="text-danger">*</span></label>
                            <input class="form-control" type="password" name="password_confirmation" id="password" placeholder="Enter Confirm password">
                        </div>
                    </div>

                  

                    <div class="form-group row text-center m-t-10">
                        <div class="col-12">
                            <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>

                </form>

                <div class="row m-t-50">
                    <div class="col-sm-12 text-center">
                        <p class="text-muted">Already have an account?  <a href="{{route('login')}}" class="text-dark m-l-5"><b>Sign In</b></a></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


@endsection