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
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end --> 
    <!-- Wishlist Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Your Wishlist items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Add To Cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse (wishlish() as $wish)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img class="img-responsive ml-15px" src="{{asset('uploads/product/')}}/{{$wish->relation_product->product_img}}" alt="" /></a>
                                        </td>
                                        <td class="product-name"><a href="#">{{$wish->relation_product->name}}</a></td>
                                        <td class="product-price-cart"><span class="amount">${{$wish->relation_product->price}}</span></td>
                                        <td class="product-wishlist-cart">
                                            <a href="{{route('addCart',$wish->id)}}">add to cart</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="alert alert-danger">
                                        <h3>No product in wishlist !</h3>
                                    </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist Area End -->
@endsection