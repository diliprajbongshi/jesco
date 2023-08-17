@extends('layouts.app')
@section('bredcrump')
<li>
    <div class="page-title-box">
        <h4 class="page-title">Home </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="">Category</a></li>
        </ol>
    </div>
</li>
@endsection
@section('content')
<div class="container">
    <div class="row ">
 
       <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header">Add Vendor</div>
            <div class="card-body">
                <form action="{{route('vendor.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="mt-3">
                            <label for="" class="form-label">Vendor name</label>
                            <input type="text" name="name" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Vendor Email</label>
                            <input type="email" name="vendor_email" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Vendor Phone Number</label>
                            <input type="text" name="phone" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Vendor Address</label>
                            <input type="text" name="address" class="form-control" id="">
                        </div>
                        
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm" type="submit">Add Vendor</button>
                        </div>
                </form>
            </div>
        </div>
       </div>
    </div>
</div>
@endsection
@section('footer_script')
<script type="text/javascript">
    $("#multipleEmail").change(function(){
       $("input:checkbox").prop('checked',$(this).prop('checked'))
    });
</script>
@endsection

