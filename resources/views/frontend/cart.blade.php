@extends('frontend.master')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Cart</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="{{route('updatecart')}}" method="POST">
                        @csrf
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $cart_total = 0;
                                        $flag = false;
                                    @endphp
                                      @if (session('stock_err'))
                                        <div class="alert alert-danger">
                                            <span>{{session('stock_err')}}</span>
                                        </div>
                                      @endif
                                    @forelse (cartlisht() as $cart)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img class="img-responsive ml-15px"
                                                src="{{asset('uploads/product/')}}/{{$cart->relation_product->product_img}}" alt="" /></a>
                                        </td>
                                        <td class="product-name"><a href="#">{{$cart->relation_product->name}}
                                         <br>
                                         Vendor name :{{getVendorName($cart->product_id)}}
                                         <br>
                                         Stock out :
                                        @if ($cart->amount > getStockout($cart->product_id))
                                            @php
                                                $flag = true;
                                            @endphp
                                            <span class="text-danger">Stock out</span>
                                            <br>
                                            <div >
                                                <span class="text-danger">Remove it</span>
                                            </div>
                                        @else
                                            <span>Available</span>
                                        @endif
                                        </a></td>
                                        <td class="product-price-cart"><span class="amount">${{$cart->relation_product->price}}</span></td>
                                        <td class="product-quantity">
                                          
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton[{{$cart->id}}]"
                                                    value="{{$cart->amount}}" />
                                            </div>
                                        </td>
                                        @php
                                            $cart_total += $cart->amount*$cart->relation_product->price;
                                        @endphp
                                        <td class="product-subtotal">${{$cart->amount*$cart->relation_product->price}}</td>
                                        <td class="product-remove">
                                            <a href="{{route('single.cart',$cart->id)}}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                     <div class="alert alert-danger">
                                        <h3>No Item Available</h3>
                                     </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="{{url('/')}}">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear">
                                        <button type="submit">Update Shopping Cart</button>
                                    </form>
                                    @auth    
                                       <a href="{{route('clear.shopping.card',auth()->id())}}">Clear Shopping Cart</a>
                                    @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-lm-30px">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                </div>
                                <div class="discount-code">
                                    @if (session('err'))
                                        <div class="alert alert-danger">
                                            {{session('err')}}
                                        </div>
                                    @endif
                                    <p>Enter your coupon code if you have one.</p>
                                    <form>
                                        <input type="text"  name="coupon_name" value="{{$coupon_name == ""? '':$coupon_name}}"/>
                                        <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 mt-md-30px">
                            @php
                                if($coupon_name){
                                    Session::put('coupon_name',$coupon_name);
                                }
                                else {
                                    Session::put('coupon_name','');
                                }
                                Session::put('cart_total',$cart_total);
                                Session::put('discount',$discount);
                                // $total = round($cart_total - $discount);
                                Session::put('total',round($cart_total - $discount));
                            @endphp
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                </div>
                                <h5>Cart Total <span>$ <span >{{$cart_total}}</span></span></h5>
                                <h5>Discount  ({{$coupon_name == ""? 'N/A':$coupon_name}})<span>${{$discount}}</span></h5>
                                <h5>Sub Total (Approx)<span> $<span id="cart_total">{{round($cart_total - $discount)}}</span> </span></h5>
                                <div class="total-shipping">
                                    <h5>Total shipping</h5>
                                    <ul>
                                        <li><input type="radio" id="shipping_1" name="shipping"/> Standard <span>$20.00</span></li>
                                        <li><input type="radio" id="shipping_2" name="shipping"/> Express <span>$30.00</span></li>
                                        <li><input type="radio" id="shipping_3" name="shipping"/> Free Shiipping <span>$00.00</span></li>
                                    </ul>
                                </div>
                                <h4 class="grand-totall-title" >Grand Total <span>$<span id="grand_total">{{round($cart_total - $discount)}}</span></span></h4>


                              @if ($flag)
                                <div class="alert alert-danger">
                                <span text-danger>Please remove the stock out product</span>
                                </div>
                                @else
                                <a class="d-none" id="checkout_btn" href="{{route('checkcout')}}">Proceed to Checkout</a>
                              @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
@endsection
@section('footer_script')

<script>
    $("#shipping_1").click(function(){
        $("#grand_total").html(parseInt($("#cart_total").html())+20)
        $("#checkout_btn").removeClass('d-none')
        @php
            Session::put('shipping',20);
        @endphp

    });
    $("#shipping_2").click(function(){
        $("#grand_total").html(parseInt($("#cart_total").html())+30)
        $("#checkout_btn").removeClass('d-none')
    });
    $("#shipping_3").click(function(){
        $("#grand_total").html(parseInt($("#cart_total").html()))
        $("#checkout_btn").removeClass('d-none')
    });
</script>

@endsection