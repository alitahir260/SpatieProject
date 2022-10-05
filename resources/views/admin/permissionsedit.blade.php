@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h4>Edit Permission
                    <a href="{{url('admin/dashboard')}}" class="btn btn-primary float-end"> Back </a>
                  </h4>
                </div>
                <div class="card-body"></div>
                <form action="{{url('/admin/permission-update' , $permissions)}}" method='POST'>
                    
                    @csrf
                    @method('PUT')
                    <h4> </h4>
                        <div class="mb-3">
                            <label> Permission Name </label>
                            <input type="text" name='name' value="{{$permissions->name }}" class="form-control">
                       </div>

                       <div>
                        <button type="" class="btn btn-primary"> UPDATE </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection