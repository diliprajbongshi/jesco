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
            <div class="card-header">Add Category</div>
            <div class="card-body">
                <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="mt-3">
                            <label for="" class="form-label">Category name</label>
                            <input type="text" name="category_name" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Category Tagline</label>
                            <input type="text" name="category_tag" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Category Photo</label>
                            <input type="file" name="category_photo" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm" type="submit">Add category</button>
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

