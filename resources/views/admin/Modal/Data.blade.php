<div></div>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="datatable1">

    
    @extends('layouts.app')
    @section('content')
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" />
 
    
    
     {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">  --}}
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
                  <a href="AddUser">
                    <button class="btn btn-primary">
                    Add User
                  </button></a>
                  
                </div>
                <div class="card-body"></div>
                
                <table class="table table-bordered table-striped datatable" id="UserTable">
                    <thead>
                        <tr>
                    
                            <th>User Name </th>
                            <th>User Email</th>
                            <th>phone No:</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="">
                        @foreach ($data as $item)
                        <tr id="sid{{$item->id}}" class="item{{$item->id}}">
                            <td hidden>{{ $item->id }}</td>
                            <td>
                                <a href="" class="update" data-name="name" data-type="text" data-pk="{{ $item->id }}" data-title="Enter name">{{ $item->name }}</a>
                            </td>
                            <td>
                                <a href="" class="update" data-name="email" data-type="text" data-pk="{{ $item->id }}" data-title="Enter Email">{{ $item->email }}</a>
                            </td>
                            <td>
                                <a href="" class="update" data-name="phone" data-type="text" data-pk="{{ $item->id }}" data-title="Enter Phone">{{ $item->phone }}</a>
                            </td>
                            {{-- <td>
                                <a class="deleteProduct btn btn-xs btn-danger" data-id="{{ $item->id }}">Delete</a>
                            </td> --}}
                            <td>
                                <a href="javascript:void(0)" onclick="editUser({{$item->id}})" class="btn btn-success">Edit </a>
                                <a href="javascript:void(0)" onclick="deleteUser({{$item->id}})" class="btn btn-danger"> Delete </a>
                            </td>
                                 {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    MODAL
                                  </button> --}}
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
                    
                            
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($admin as $ad)
                        <tr>
                            <td hidden>{{$ad->id}}</td>
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
                        
                            
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($us as $use)
                        <tr>
                            <td hidden>{{$use->id}}</td>
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

 {{-- MODAL --- --}}

 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    {{-- Alert --}}
                        <div class="alert alert-success" id="success-alert">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Success!</strong> Your Data Has Been Updated Succesfully.
                        </div>

                        <div class="card-body">
                            <form id="studentEditForm" method="POST" action="{{ url('ShowData') }}">
                                @csrf   
                               @method('PUT')
                                <input type="hidden" id="id" name="id">
                         

                                   
                                    <div class="mb-3">
                                        <label> Name </label>
                                        <input type="text" name='id' id="id" value="" hidden class="form-control" placeholder="Please Enter YOur name">

                                        <input type="text" name='name' id="name2" value="" class="form-control" placeholder="Input Name">
                                   </div>
                           
                             
            
                                   <div class="mb-3">
                                    <label> Email </label>
                                    <input type="text" name='email' id="email2" value="" class="form-control" placeholder="Input Email">
                               </div>
            
                               <div class="mb-3">
                                <label> Phone No: </label>
                                <input type="text" name='phone_no' id="phone_no" value="" class="form-control" placeholder="Input Phone No">
                           </div>
            
                                   <div>
                                    <button type="submit" class="btn btn-success reload" id="alert"> UPDATE </button>
                                </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</div>
</body>
</html>

<script type="text/javascript">



$(document).ready(function() {
$("#studentEditForm").validate({
rules: {
name : {
required: true,
minlength: 2
},
email: {
required: true,
email: true
},
phone_no: {
    required:true,
}

}

});
});




    $('.hidethis').hide();
    $("#success-alert").hide();

    $("#alert").click(function showAlert() {
        
    $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
    
    });   
});
    
    
    function editUser(id)
        {
            $.get('/Users/'+id,function(users){
                $('#id').val(users.id);
                $('#name2').val(users.name);
                $('#email2').val(users.email);
                $('#password2').val(users.password);
                $('#phone_no').val(users.phone);
                $('#editModal').modal('toggle');
            })
            
    
        }
    
        $("#studentEditForm").submit(function(e){
            e.preventDefault();
            let id= $("#id").val();
            let name= $("#name2").val();
            let email= $("#email2").val();
            let phone= $("#phone_no").val();
    

            $.ajax({
            method: "put",
            url: "{{route('student.update')}}",
            data:{
                id:id,
                name:name,
                email:email, 
                phone:phone,
                _token: "{{ csrf_token() }}",
            },
            success:function(response)
            {
                           
                if(response)
                {
                    
                    setTimeout(function() {
                    $("#editModal").modal('toggle');
                    $("#studentEditForm")[0].reset();
                    location.reload();
                 }, 3000);
                 
             }
            }
        });
        });


        function deleteUser(id)
        {
            if(confirm("Are You Sure?"))
            {
                $.ajax({
            method: "DELETE",
            url: '/User/'+id,
            data:{
                _token: "{{ csrf_token() }}"    
            },
            success:function(response)
            {
                if(response)
                {    
                    $("#sid"+id).remove();
                }
            }
        });
        }
    }
//bracket


</script>


<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    $('.update').editable({
        url: "{{ route('inline.update') }}",
        type: 'text',
        datatype: "json",   
        pk: 1,
        name: 'name',
        // title: 'Enter name'
    });

    // $(".deleteProduct").click(function(){
    //     $(this).parents('tr').hide();
    //     var id = $(this).data("id");
    //     var token = '{{ csrf_token() }}';
    //     $.ajax(
    //     {
    //         method:'POST',
    //         url: "inline/delete/"+id,
    //         data: {_token: token},
    //         success: function(data)
    //         {
    //             toastr.success('Successfully!','Delete');
    //         }
    //     });
    // });
</script>


@endsection

           


              {{-- // window.location.reload();
              // $('#sid'+response.id+'td:nth-child(1)').text(response.name);
              // $('#sid'+response.id+'td:nth-child(1)').text(response.email);
              // $('#sid'+response.id+'td:nth-child(1)').text(response.phone);
              // $("editModal").modal('toggle');
              // $("editForm")[0].reset(); --}}
         

               {{-- $("#datatable tbody").prepend('<tr><td>'+ response.name +'</td><td>'+ response.email +'</td><td>'+ response.phone +'</td></tr>'); --}}