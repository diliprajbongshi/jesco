@extends('layouts.app')
@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Home</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Category list</a></li>
    </ol>
</div>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="card-header">
                 <h3>List Category</h3>
           </div>
            <div class="card-body" style="background: #fff">
                <table class="table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Category name</th>
                        <th>Category Tagline</th>
                        <th>Status</th>
                        <th>Category Image</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($categories as $key=>$category)
                        <tr>
                            <td>{{$categories->firstItem()+$key}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->category_tag}}</td>
                            <td>
                                {{$category->status}}
                            </td>
                            <td>
                                <img width="100" src="{{asset('uploads/category/')}}\{{$category->category_photo}}" alt="">
                            </td>
                            <td class="d-flex justify-content-between">
                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-primary me-3">Edit</a>
                                {{-- <a href="{{route('category.show',$category->id)}}" class="btn btn-sm btn-warning me-3">Show</a> --}}

                                <form action="{{route('category.destroy',$category->id)}}" method="POST">
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
                {{$categories->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
