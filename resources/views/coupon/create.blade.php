@extends('layouts.app')
@section('bredcrump')
<li>
    <div class="page-title-box">
        <h4 class="page-title">Home </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="">Coupon</a></li>
        </ol>
    </div>
</li>
@endsection
@section('content')
<div class="container">
    <div class="row ">
 
       <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header">Add Coupon</div>
            <div class="card-body">
                @if ($errors->all())
                    @foreach ($errors->all() as $err)
                        <ul>
                        <div class="alert alert-danger">
                            <li class="text-danger">{{$err}}</li>
                        </div>
                        </ul>
                    @endforeach
                @endif
                <form action="{{route('coupon.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="mt-3">
                            <label for="" class="form-label">Coupon name</label>
                            <input type="text" name="coupon_name" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Coupon Percentage</label>
                            <input type="number" name="discount_percentage" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Coupon Validity</label>
                            <input type="date" name="validity" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Coupon Validity</label>
                            <input type="number" name="limit" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm" type="submit">Add Coupon</button>
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

