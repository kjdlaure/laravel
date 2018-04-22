@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User List</div>

                <div class="panel-body">
                    <button class="btn btn-danger delete_all" data-url="{{ url('/userDeleteMultiple')}}">
                        <span class="fa fa-trash-o fa-fw"></span>Delete All Selected
                    </button>

                   <table class="table table-striped">
                    <thead>
                      <tr>
                        <th width="50px"><input type="checkbox" id="master"></th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Operations</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($users as $user)
                          <tr id="tr_{{$user->id}}">
                            <td><input type="checkbox" class="sub_chk" data-id="{{$user->id}}"></td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" onclick="window.location='{{ route("user.show", ['id' => $user->id]) }}'">                                    
                                    <span class="fa fa-eye fa-fw"></span>
                                </button>
                                <button type="button" class="btn btn-success" onclick="window.location='{{ route("user.edit", ['id' => $user->id]) }}'">                                    
                                    <span class="fa fa-pencil fa-fw"></span>
                                </button>
                                <button type="button" class="btn btn-danger deleteBtn" data-url="{{ url('user',$user->id) }}"> 
                                     <span class="fa fa-trash-o fa-fw"></span>
                                </button>
                            </td>
                          </tr>                     
                        @endforeach

                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
    {{$users->links()}}
</div>
@endsection


@section('scripts')

<script type="text/javascript">
    $(document).ready(function () {
         $('#master').on('click', function(e) {
             if($(this).is(':checked',true))  
             {
                $(".sub_chk").prop('checked', true);  
             } else {  
                $(".sub_chk").prop('checked',false);  
             }  
        });

         $('.delete_all').on('click', function(e) {


            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  


            if(allVals.length <=0)  
            {  
                alert("Please select user/s.");  
            }  else {  


                var check = confirm("Are you sure you want to delete selected user/s?");  
                if(check == true){  


                    var join_selected_values = allVals.join(","); 


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                }  
            }  
        });

        $('.deleteBtn').on('click', function(e) {
           var check = confirm("Are you sure you want to delete this user?");   

           if(check == true){
                $.ajax({
                    url: $(this).attr('data-url'),
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });
           }
        });
    });
</script>

@endsection