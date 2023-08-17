@extends('layouts.app')
@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Home</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Thumbnail list</a></li>
    </ol>
</div>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12"> 
           <div class="card-header">
                 <h3>Thumbnail List</h3>
           </div>
            <div class="card-body" style="background: #fff">
            
                <table class="table table-bordered">
                    {{-- {{$thumbnails}} --}}
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Img</th>
                        <th>Ation</th>
                    </tr>
                        @foreach ($thumbnails as $key=>$thumbnail)
                         <tr>
                             <th>{{$thumbnails->firstItem()+$key}}</th>
                             <th>{{$thumbnail->relation_to_product->name}}--{{$thumbnail->product_id}}</th>
                            <th>
                                <img width="100" src="{{asset('uploads/thumb/')}}\{{$thumbnail->thumbnail}}" alt="">
                            </th>
                            <th>
                                <a href="{{route('del.thumb',$thumbnail->id)}}" class="btn btn-danger">Del</a>
                            </th>
                        </tr>
                        @endforeach
                </table>
                {{$thumbnails->links()}}
            </div>
        </div>
    </div>
</div>

@endsection