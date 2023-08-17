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
            <div class="card-header">Add Product</div>
            <div class="card-body">
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="mt-3">
                            <label for="" class="form-label">Category name</label>
                            <select name="category_id" class="form-control">
                                <option value="">--Select one--</option>
                                @foreach ($categories as $category)
                                   <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Product name</label>
                            <input type="text" name="name" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Product Price</label>
                            <input type="number" name="price" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Product Quantity</label>
                            <input type="number" name="product_quantity" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label"> Short Description</label>
                            <input type="text" name="shor_desp" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Long Descripiton</label>
                           <textarea name="long_desp" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Product Image</label>
                            <input type="file" name="product_img" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Thumbnail</label>
                            <input type="file" multiple name="thumbnail[]" class="form-control" id="">
                        </div>
                        
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm" type="submit">Add Product</button>
                        </div>
                </form>
            </div>
        </div>
       </div>
    </div>
</div>
@endsection


