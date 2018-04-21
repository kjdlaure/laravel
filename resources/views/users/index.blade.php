@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User List</div>

                <div class="panel-body">
                   <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Operations</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($users as $user)
                          <tr>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" onclick="window.location='{{ route("user.show", ['id' => $user->id]) }}'">
                                    View
                                </button>
                                <button type="button" class="btn btn-success" onclick="window.location='{{ route("user.edit", ['id' => $user->id]) }}'">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger">
                                    Delete
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
</div>
@endsection
