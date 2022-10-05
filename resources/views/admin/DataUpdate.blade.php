@extends('layouts.app')
@section('content')

<div class="container">


    @if (session('message'))
            
                <h4 class="alert alert-success">{{session('message')}}</h4>
        
            @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h4>Edit User Info
                    <a href="{{url('admin/roles')}}" class="btn btn-primary float-end"> Back </a>
                  </h4>
                </div>
                <div class="card-body"></div>
                <form action="{{url('admin/DataUpdated' , $users)}}" method='POST'>
                    
                    @csrf
                    @method('PUT')
                    <h4> </h4>
                        <div class="mb-3">
                            <label> User Name </label>
                            <input type="text" name='name' value="{{$users->name}}" class="form-control">
                       </div>

                       <div class="mb-3">
                        <label> User Email </label>
                        <input type="text" name='email' value="{{$users->email}}" class="form-control">
                   </div>

                   <div class="mb-3">
                    <label> User Password </label>
                    <input type="text" name='password' value="{{$users->password}}" class="form-control">
               </div>

                       <div>
                        <button type="submit" class="btn btn-primary"> UPDATE </button>
                    </div>


          

        </div>
    </div>
</div>
@endsection