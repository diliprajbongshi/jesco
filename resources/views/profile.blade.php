@extends('layouts.app')
@section('bredcrump')
<li>
    <div class="page-title-box">
        <h4 class="page-title">Home </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="">Profile</a></li>
        </ol>
    </div>
</li>
@endsection
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-6">
            <div class="card bg-white">
                <div class="card-header">{{ __('Change Name') }}</div>

                <div class="card-body">
                    @if (session('sucess'))
                        <div class="alert alert-primary">{{session('sucess')}}</div>
                    @endif
                    <form action="{{route('profile.name')}}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" value="{{Auth::user()->name??''}}" class="form-control">
                            @error('name')
                               <span class="text-danger"> {{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-3">
                           <button class="btn btn-primary btn-sm" type="submit">Change Name</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card bg-white mt-3">
                <div class="card-header">{{ __('Change Profile Picture') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                           @foreach ($errors->all() as $error)
                            <li> {{$error}}</li>
                           @endforeach
                        </div>
                    @endif
                    @if (session('sucess_p'))
                      <div class="alert alert-primary">{{session('sucess_p')}}</div>
                    @endif
                    <form action="{{route('profile.changephoto')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (session('photo'))
                            <div class="alert alert-success">
                                <span>{{session('photo')}}</span>
                            </div>
                        @endif
                        <div class="row">
                            <div class="text-center col-12">
                                <img width="100" id="blah"  src="{{asset('uploads/profile')}}/{{Auth::user()->profile}}" alt="profile">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Profile Photo</label>
                            <input type="file" name="profile"   onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control">
                        </div>
                       
                        <div class="mt-3">
                           <button class="btn btn-primary btn-sm" type="submit">Change your profile photo </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-white">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                           @foreach ($errors->all() as $error)
                            <li> {{$error}}</li>
                           @endforeach
                        </div>
                    @endif
                    @if (session('sucess_p'))
                      <div class="alert alert-primary">{{session('sucess_p')}}</div>
                    @endif
                    <form action="{{route('profile.changepassword')}}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label for="" class="form-label">Old Password</label>
                            <input type="password" name="old_password" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Password Confirm</label>
                            <input type="password" name="password_confirm" class="form-control">
                        </div>
                        <div class="mt-3">
                           <button class="btn btn-primary btn-sm" type="submit">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
