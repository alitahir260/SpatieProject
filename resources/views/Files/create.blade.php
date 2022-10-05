@extends('Files.layout')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      <h1>
        @if (session('message'))
            
        <h4 class="alert alert-success">{{session('message')}}</h4>

    @endif

      </h1>
      <form action="{{ url('store-files') }}" method="post" enctype="multipart/form-data">  
        {!! csrf_field() !!}
        <input class="form-control" name="photo" type="file" id="photo">
        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>
  
  </div>
</div>
@stop