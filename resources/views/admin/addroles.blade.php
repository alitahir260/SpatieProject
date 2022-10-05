@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h4>ADD Role
                    <a href="{{url('dashboard')}}" class="btn btn-primary float-end"> Back </a>
                  </h4>
                </div>
                <div class="card-body"></div>
                <form action="{{url('/store-role')}}" method='POST'>
                    @csrf
                    <h4>Category </h4>
                        <div class="mb-3">
                            <label> Role Name </label>
                            <input type="text" name='name' class="form-control">
                       </div>

                       <div>
                        <button type="" class="btn btn-danger"> SAVE </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection