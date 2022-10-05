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
                  <h4>Edit Roles
                    <a href="{{url('admin/roles')}}" class="btn btn-primary float-end"> Back </a>
                  </h4>
                </div>
                <div class="card-body"></div>
                <form action="{{url('admin/role-update' , $roles)}}" method='POST'>
                    
                    @csrf
                    @method('PUT')
                    <h4> </h4>
                        <div class="mb-3">
                            <label> Role Name </label>
                            <input type="text" name='name' value="{{$roles->name}}" class="form-control">
                       </div>


                        

                       <div>
                        <button type="" class="btn btn-primary"> UPDATE </button>
                    </div>


                </form>



                <div class="mt-6 p-2">
                    <h2 class="text-2xl font-semibold">
                        Role Permissions ->
                    </h2>

                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($roles->permissions)
                            @foreach($roles->permissions as $roles_permission)
                            <form action="{{url('admin/revoke-roles',[$roles->id,$roles_permission->id])}}" onsubmit="return confirm('Are You Sure?');" class="flex -ml-px">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-dark" type="">{{$roles_permission->name}}</button>
                        </form>
                            @endforeach
                        @endif

                    </div>

                       {{-- @foreach($roles->permissions as $role_permission)
                                <span>{{$role_permission->name}}</span>
                            @endforeach --}}

                    <form action="{{url('admin/roles/assign-permission' , $roles)}}" method='POST'>
                    
                    @csrf
                        
                    <h4> </h4>
                        <div class="mb-3">
                            <label for="permissions" class="block text-sm font-medium text-gray-700">Permission</label>
                <select id="permissions" name="permissions" autocomplete="permissions-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  @foreach ($permissions as $permission)
                      <option value="{{$permission->name}}">{{$permission->name}}</option> 
                  @endforeach
                </select>
              </div>

                       <div>
                        <button type="" class="btn btn-primary"> UPDATE </button>
                    </div>


                </form>
           </div>


            </div>

        </div>
    </div>
</div>
@endsection