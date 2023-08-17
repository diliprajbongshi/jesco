@extends('layouts.app')
@section('bredcrump')
<li>
    <div class="page-title-box">
        <h4 class="page-title">Home </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="">Location</a></li>
        </ol>
    </div>
</li>
@endsection
@section('content')
<div class="container">
    <div class="row ">
 
       <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header">Location List</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Country name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($active_location as $key=>$location)
                        <tr>
                            <td>{{$active_location->firstItem()+$key}}</td>
                            <td>{{$location->name}}</td>
                            <td>
                                <a href="{{route('edit.country',$location->id)}}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{$active_location->links()}}
            </div>
        </div>
       </div>
    </div>
</div>
@endsection
@section('footer_script')
<script type="text/javascript">
    $(document).ready(function() {
    $('#country_drop').select2();
});
</script>
@endsection

