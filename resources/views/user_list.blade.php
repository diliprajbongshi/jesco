@extends('layouts.app')
@section('bredcrump')
<li>
    <div class="page-title-box">
        <h4 class="page-title">Home </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="">Profile</a></li>
        </ol>
    </div>
</li>
@endsection
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12 m-auto">
            <div class="card bg-white">
                <div class="card-header">{{ __('User List') }}</div>

                <div class="card-body">
                 
                    @if (auth()->user()->role == 2)
                    
                    <table class="table table-bordered table-sm">
                        <tr>
                            <th width="50">
                                <input type="checkbox" id="multipleEmail"  > all
                            </th>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                           
                        </tr>
                        <form action="{{route('multipleEmail')}}" method="POST">
                            @csrf
                        @foreach ($users as $key=>$user)
                            <tr> 
                                <td> <input type="checkbox"  name="check[]" value="{{$user->id}}"></td>
                                {{-- <td>{{$key+1}}</td> --}}
                                <td>{{ $users->firstItem() + $key }}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    <a href="{{route('email',$user->id)}}" class="btn btn-info btn-sm">Send</a>
                                </td>
                                
                            </tr>
                        @endforeach
                     
                        <tr>
                            <td class="text-center">
                                <button class="btn btn-sm btn-info" type="submit">Send all</button>
                            </td>
                        </tr>
                    </form>
                    </table>
                    {{$users->links()}}
                    @else
                        <div class="alert alert-danger">
                            You are not allow to see this page.
                        </div>
                    @endif
                     
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

