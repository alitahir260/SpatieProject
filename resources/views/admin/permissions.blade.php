@extends('layouts.app')
@section('content')

 <div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
            
                <h4 class="alert alert-success">{{session('message')}}</h4>
            
                
            @endif

            <div class="card">
                <div class="card-header">
                  <h4>Category List
                    @can('create access')
                    <a href="{{url('admin/add-permission')}}" class="btn btn-primary float-end"> Add Permissions </a>
                    @endcan
                   
                  </h4>
                </div>
                <div class="card-body"></div>
                
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Permissions </th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($permissions as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                        @can('create access')
                                
                            <td><a href="{{url('admin/permission-edit',$item->id)}}">
                                <button class="btn btn-primary btn-sm">Update</button>
                            </a></td>
                                <td>
                                    <form action="{{url('admin/permission-delete',$item->id)}}" onsubmit="return confirm('Are You Sure?');">
                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-dark" type="">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        @endcan
                        @endforeach
                    </tbody>

                </table>
                    
            </div>
        </div>
    </div>
 </div>

@endsection