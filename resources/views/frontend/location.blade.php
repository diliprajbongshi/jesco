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
            <div class="card-header">Add Location</div>
            <div class="card-body">
                <form action="{{route('add.location')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="mt-3">
                            <label for="" class="form-label">Location name</label>
                            <select  id="country_drop" name="countries[]" multiple="multiple" class="form-control">
                                @foreach ($countries as $country)
                                   <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                   
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm" type="submit">Update Location</button>
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
    $(document).ready(function() {
    $('#country_drop').select2();
});
</script>
@endsection

