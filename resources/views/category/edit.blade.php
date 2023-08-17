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
            <div class="card-header">Update Category</div>
            <div class="card-body">
                <form action="{{route('category.update',$categori_edit->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="mt-3">
                            <label for="" class="form-label">Category Status</label>
                             <select name="status" id="" class="form-control">
                                <option value="show" {{($categori_edit->status == 'show'? 'selected':'')}}>Show</option>
                                <option value="hide"  {{($categori_edit->status == 'hide'? 'selected':'')}}>Hide</option>
                             </select>
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Category name</label>
                            <input type="text" name="category_name" class="form-control" value="{{$categori_edit->category_name}}">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Category Tagline</label>
                            <input type="text" name="category_tag" class="form-control" value="{{$categori_edit->category_tag}}">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Category Photo</label><br/>
                            <img width="100" id="blah" src="{{asset('uploads/category/')}}/{{$categori_edit->category_photo}}" alt="Edit photo">
                            <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" name="category_photo" class="form-control" id="">
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm" type="submit">Update</button>
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

