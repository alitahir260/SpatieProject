@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h4>ADD Permission
                    <a href="{{url('Permission')}}" class="btn btn-primary float-end"> Back </a>
                  </h4>
                </div>
                <div class="card-body"></div>
                <form action="{{url('admin/store-permission')}}" method='POST'>
                    @csrf
                    <h4>Category </h4>
                        <div class="mb-3">
                            <label> Permission Name </label>
                            <input type="text" name='name' class="form-control">
                       </div>

                       <div>
                        <button type="submit" class="btn btn-danger"> SAVE </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection