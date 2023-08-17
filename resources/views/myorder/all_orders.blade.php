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
 
       <div class="col-lg-12 m-auto">
        <div class="card">
            <div class="card-header">My Order</div>
            <div class="card-body">
              <table class="table table-bordered">
                   <tr>
                      <th>Order Id</th>
                      <th>Grant Total</th>
                      <th>Payment Option</th>
                      <th>Payment Status</th>
                      <th>Delevered Status</th>
                      <th>Qr Code</th>
                      <th>Action</th>
                   </tr>
                   @foreach ($order_summaries as $order_summary)
                    <tr>
                        <td>{{$order_summary->id}}</td>
                        <td>{{$order_summary->grand_total}}</td>
                        <td>
                            @if ($order_summary->payment_option == 1)
                              Cash on delivery  
                            @else
                                Online payment
                            @endif
                        </td>
                        <td>
                            @if ($order_summary->payment_status == 1)
                               <span class="badge badge-primary">  Paid  </span>
                            @else
                               <span class="badge badge-danger">    Not paid yet  </span>
                            @endif
                        </td>
                        <td>
                            @if ($order_summary->delivered_status == 0)
                              <span class="badge badge-warning">  Pending  </span>
                            @else
                              <span class="badge badge-primary">  Delivered  </span>
                            @endif
                        </td>
                        <td >
                            {!!  DNS2D::getBarcodeHTML("$order_summary->id", 'QRCODE',3,3) !!}
                        </td>
                        <td>
                            <a href="{{route('order.details',Crypt::encryptString($order_summary->id))}}" class="btn btn-primary">Details</a>
                            @if ($order_summary->payment_status == 1 && $order_summary->delivered_status == 0)  
                                <a href="{{route('mark.as.received',$order_summary->id)}}" class="btn btn-warning">Mark as received</a>
                            @endif
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

