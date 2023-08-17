@extends('layouts.app')
@section('bredcrump')
<li>
    <div class="page-title-box">
        <h4 class="page-title">Home </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="">Location</a></li>
        </ol>
    </div>
</li>
@endsection
@section('content')
<div class="container">
    <div class="row ">
 
       <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header">Add Location</div>
            <div class="card-body">
                <form action="{{route('update.country',$counrty_info->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="mt-3">
                            <label for="" class="form-label">Location name</label>
                            <input type="text" name="" id="" value="{{$counrty_info->name}}" class="form-control">
                            
                        </div>
                        <div class="mt-3">
                            <select  name="status"  class="form-control">
                                <option value="active" {{$counrty_info->status == 'active' ?'selected':'' }}>Active</option>
                                <option value="deactive" {{$counrty_info->status == 'deactive' ?'selected':'' }}>Deactive</option>
                            </select>
                        </div>
                   
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm" type="submit">Update Location</button>
                        </div>
                </form>
            </div>
        </div>
       </div>
    </div>
</div>
@endsection


