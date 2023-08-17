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
                        <li class="breadcrumb-item"><a href="index.html">Products</a></li>
                        {{-- <li class="breadcrumb-item active"></li> --}}
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <form action="">
                <label for="" class="form-label mt-2">Price Filter</label>
                <div class="mt-3">
                    <input type="number" name="min" id="" class="form-control" placeholder="Min" value="{{$min}}">
                </div>
                <div class="mt-3">
                    <input type="number" name="max" id="" class="form-control" placeholder="Max" value="{{$max}}">
                </div>
                <div class="mt-3">
                   <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
        <div class="col-lg-9">
            <div class="container">
                <div class="row">
                    @foreach ($all_products as $product)
                       @include('parts.product_thump')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



@endsection