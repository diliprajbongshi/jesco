@extends('layouts.app')
@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Home</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Product list</a></li>
    </ol>
</div>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"> 
           <div class="card-header">
                 <h3>Product List</h3>
           </div>
            <div class="card-body" style="background: #fff">
                <table class="table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Product name</th>
                        <th>Product Tagline</th>
                        <th>Product Image</th>
                        <th class="text-center">Action</th>
                    </tr>
                     @forelse ($all_products as $product)
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                           
                            <td>
                                <img width="100" src="{{asset('uploads/product/')}}\{{$product->product_img}}" alt="">
                            </td>
                            <td class="d-flex justify-content-around">
                                <a href="{{route('category.edit',$product->id)}}" class="btn btn-sm btn-primary me-3">Edit</a>
                                 <a href="{{route('category.show',$product->id)}}" class="btn btn-sm btn-warning me-3">Show</a> 

                                 <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                   <button class="btn btn-sm btn-danger" >Del</button>
                                </form>
                            </td>


                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="5">No data found</td>
                        </tr>
                    @endforelse 
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
