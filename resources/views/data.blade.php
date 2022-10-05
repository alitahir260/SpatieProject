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
                  <h4>Database
                    <a href="{{url('test')}}" class="btn btn-primary float-end"> </a>
                  </h4>
                </div>
                <div class="card-body"></div>
                
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name </th>
                            <th>User Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    MODAL
                                  </button>
                                {{-- <a href="{{url('admin/DataUpdate' ,$item->id)}}">
                                <button class="btn btn-primary btn-sm">Update</button>
                                </a> --}}
                            </td>
                                
                        </tr>
                        @endforeach
                    </tbody>
                    <span>
                        {{-- {{$data->links()}} --}}
                    </span>

                </table>

                <div class="card">
                    <div class="card-header">
                      <h3>Admins List
                        <a href="{{url('test')}}" class="btn btn-primary float-end"> </a>
                      </h3>
                    </div>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>All Admins</th>
                            <th>Admin Name </th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($admin as $ad)
                        <tr>
                            <td>{{$ad->id}}</td>
                            <td>{{$ad->name}}</td>
                          
                        </tr>
                        @endforeach
                    </tbody>
                  
                    <span>
                        {{-- {{$data->links()}} --}}
                    </span>

                </table>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>All users</th>
                            <th>users Name </th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($us as $use)
                        <tr>
                            <td>{{$use->id}}</td>
                            <td>{{$use->name}}</td>
                          
                        </tr>
                        @endforeach
                    </tbody>
                  
                    <span>
                        {{-- {{$data->links()}} --}}
                    </span>

                </table>
                    
            </div>
        </div>
    </div>
 </div>


 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">REGISTRATION</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Register A New Admin') }}</div>
        
                        <div class="card-body">
                            <form id="form" method="POST" action="{{ url('Modal') }}">
                                @csrf
                               
                                    <h4 class="ajax-res alert alert-success"></h4>
                                
                                
                                    
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        @endsection
       
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
