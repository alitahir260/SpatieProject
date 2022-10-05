
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}
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
                
                <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name </th>
                            <th>User Email</th>
                            <th>phone No:</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $item)
                        <tr id="sid{{$item->id}}">
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            {{-- <td class="hidethis">{{$item->password}}</td> --}}
                            <td>
                                <a href="javascript:void(0)" onclick="editUser({{$item->id}})" class="btn btn-success">Edit </a>
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
        
                        <div class="card-body">
                            <form id="studentEditForm" method="POST" action="{{ url('UpdateAllData') }}">
                                
                               @method('PUT')
                                <input type="hidden" id="id" name="id">
                                    <h4 class="ajax-res alert alert-success"></h4>

                                    <h4> </h4>
                                    <div class="mb-3">
                                        <label> User Name </label>
                                        <input type="text" name='id' id="id" value="" hidden class="form-control" placeholder="Please Enter YOur name">

                                        <input type="text" name='name' id="name2" value="" class="form-control" placeholder="Please Enter YOur name">
                                   </div>
            
                                   <div class="mb-3">
                                    <label> User Email </label>
                                    <input type="text" name='email' id="email2" value="" class="form-control" placeholder="Please Enter YOur Email">
                               </div>
            
                               <div class="mb-3">
                                <label> User Phone </label>
                                <input type="text" name='phone_no' id="phone_no" value="" class="form-control" placeholder="Password">
                           </div>
            
                                   <div>
                                    <button type="submit" class="btn btn-success"> UPDATE </button>
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
       


{{-- <script>
    function editUser(id)
    {
        $.get('/Users/'+id,function(users){
            $('#id').val(users.id);
            $('#name2').val(users.id);
            $('#email2').val(users.id);
            $('#password2').val(users.id);
            $('#editModal').modal('toggle');
        })
    }
</script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script></body> --}}

</body>
</html>

<script type="text/javascript">

    $('.hidethis').hide();
    
    
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
                setTimeout(function(){// wait for 5 secs(2)
           location.reload(); // then reload the page.(3)
            }, 2000); 
                // window.location.reload();
                // $('#sid'+response.id+'td:nth-child(1)').text(response.name);
                // $('#sid'+response.id+'td:nth-child(1)').text(response.email);
                // $('#sid'+response.id+'td:nth-child(1)').text(response.phone);
                // $("editModal").modal('toggle');
                // $("editForm")[0].reset();
        

            }
        });
        });




            // $(document).ready(function(){
            //     var table = $('#datatable').DataTable();
    
            //     //start edit record
            //     table.on('click','.edit',function(e){
            //         e.preventDefault();
                    
    
            //         $tr =$(this).closest('tr');
            //         if($($tr).hasClass('child')){
            //             $tr = $tr.prev('.parent');
            //         }
    
            //         var data = table.row($tr).data();
            //         console.log(data);
    
            //         $('#name').val(data[1]);
            //         $('#email').val(data[2]);
            //         $('#password').val(data[3]);
    
            //         var id= $("#id").val(data[0]);
    
            //         // $('#editForm').attr('action','/AllData/'+data[0]);
            //         var url= $('#editForm').attr('action','/UpdateAllData/'+data[0]);
            //         $('#editModal').modal('show');
                    
            //         $.ajax({
            //             url:url,
            //             type:'put',
            //             data:data,
            //             dataType:'json',
            //             beforeSend:function(){
            //                 $(".save-data").addClass('disabled').text('Loading...');
            //             },
            //             success:function(res){
            //                 $(".ajax-res").text('Data has been added');
            //                 $(".save-data").removeClass('disabled').text('Submit');
            //             }
            //         });
    
            //     });
            //     //end edit record
            // });
    
            $(document).ready(function() {
             $("#editForm").validate({
            rules:{
                name:{
                    required: true,
                    minlength: 4
                },  
                email:{
                    required:true,
                    required:email,
    
                },
                password:{
                    required:true,
                    minlength:8,
                    maxlength:200
                },
                messages:{
                name:{
                    minlength: "Please enter min 5 char"
                }
            }
        }
    
    });
    });
    
    </script>