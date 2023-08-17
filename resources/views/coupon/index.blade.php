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
            <div class="card-header">Coupon List</div>
            <div class="card-body">
               <table class="table table-bordered">
                <tr>
                    <th>Sl</th>
                    <th>Coupon Name</th>
                    <th>Percentage</th>
                    <th>
                        Validity
                    </th>
                    <th>Limit</th>
                    <th>Action</th>
                </tr>
                @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$coupon->coupon_name}}</td>
                        <td>{{$coupon->discount_percentage}}</td>
                        <td>{{$coupon->validity}}</td>
                        <td>{{$coupon->limit}}</td>
                        <td>
                            <a href="" class="btn btn-danger">Del</a>
                        </td>
                    </tr>
                @endforeach
               </table>
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

