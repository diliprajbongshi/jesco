@extends('frontend.master')
@section('content')
   <!-- breadcrumb-area start -->
   <div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Shop</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->


<!-- checkout area start -->
<div class="checkout-area pt-100px pb-100px">
    <div class="container">
        <form action="{{route('checkout_cart')}}" method="POST">
            @csrf
      
        <div class="row">
            {{-- @if ($errors->all())
                @foreach ($errors->all() as $err)
                     <li class="text-danger">{{$err}}</li>
                @endforeach
            @endif --}}
            <div class="col-lg-7">
                <div class="billing-info-wrap">
                    <h3>Billing Details</h3>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-4">
                                <label>Name</label>
                                <input type="text" value="{{auth()->user()->name}}" name="name"/>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-4">
                                <label>Email</label>
                                <input type="text" value="{{auth()->user()->email}}" name="email"/>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-4">
                                <label>Phone</label>
                                <input type="text" name="phone"/>
                                @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="col-lg-12">
                            <div class="billing-select mb-4">
                                <label>Country</label>
                                <select name="country" id="country_drop">
                                    <option>Select a country</option>
                                    @foreach ($countries as $country)
                                      <option value="{{ $country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-select mb-4">
                                <label>City</label>
                                <select name="city" id="city_drop" disabled>
                                    <option value="">--Select City--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-4">
                                <label>Address</label>
                                <input class="billing-address" placeholder="House number and street name"
                                    type="text" name="address"/>
                            </div>
                        </div> 
                       
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-4">
                                <label>Postcode / ZIP</label>
                                <input type="text" name="postcode"/>
                            </div>
                        </div>
                      
                    </div>
                    
                    <div class="additional-info-wrap">
                        <h4>Additional information</h4>
                        <div class="additional-info">
                            <label>Order notes</label>
                            <textarea placeholder="Notes about your order, e.g. special notes for delivery. "
                                name="message"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                <div class="your-order-area">
                    <h3>Your order</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                            <div class="your-order-top">
                                <ul>
                                    <li>Product</li>
                                    <li>Total</li>
                                </ul>
                            </div>
                            <div class="your-order-middle">
                                <ul>
                                    @forelse (cartlisht() as $cart)
                                    <li><span class="order-middle-left">{{$cart->relation_product->name}} X {{$cart->amount}}</span> <span
                                            class="order-price">${{$cart->amount*$cart->relation_product->price}}</span></li>
                                      @empty
                                      <li>
                                        No product purchage  
                                      </li>      
                                    @endforelse
                                </ul>
                            </div>
                            <div class="your-order-bottom">
                                <ul>
                                    <li class="your-order-shipping">Cart Total</li>
                                    <li>${{ Session::get('cart_total')}}</li>
                                </ul>
                                <ul>
                                    <li class="your-order-shipping">Discount ({{Session::get('coupon_name')}})</li>
                                    <li>${{ Session::get('discount')?? 0}}</li>
                                </ul>
                              
                                <ul>
                                    <li class="your-order-shipping">Sub Total</li>
                                    <li>${{ Session::get('cart_total') - Session::get('discount')}}</li>
                                </ul>
                                <ul>
                                    <li class="your-order-shipping">Shipping</li>
                                    <li>${{ Session::get('shipping')}}</li>
                                </ul>
                            </div>
                            <div class="your-order-total">
                                <ul>
                                    <li class="order-total">Grand Total</li>
                                    <li>${{ Session::get('total')}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="payment-method">
                            <div class="additional-info-wrap">
                                <h4>Payment System</h4>
                                <div class="payment_system">
                                   <div class="d-flex">
                                     <span><input type="radio" name="payment"  value="1" class="mt-1" ></span><span class="mt-3 ms-3">Cash on delivery</span>
                                     <span class="ms-5"><input type="radio" name="payment" value="2" class="mt-1" ></span><span class="mt-3 ms-3">Online Payment</span>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Place-order mt-25">
                        <input type="submit" class="btn btn-primary" value="Place order">
                    </div>
                </div>
            </div>
        </div>
       </form>
    </div>
</div>
<!-- checkout area end -->

 
@endsection
@section('footer_script')
<script>
    $(document).ready(function() {
    $('#country_drop').select2();
    $('#country_drop').change(function(){
        let country_id = $(this).val();
        $('#city_drop').attr('disabled',false);

       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
             url:'getCity',
             data:{country_id:country_id},
             success:function(data){
               $("#city_drop").html(data)
             }
            
        });


    });
});
</script>
@endsection