@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              
                <div class="panel-body">
                   <table class="table">
                    <thead>
                      <tr>
                        <th>Details for {{$user->username}}</th>
                        
                      </tr>
                    </thead>
                    <tbody>                       
                        <tr>
                            <td>ID: {{$user->id}}</td>
                        </tr>
                        <tr>    
                            <td>Name: {{$user->first_name}} {{$user->last_name}}</td>
                        </tr>
                         <tr>    
                            <td>Username: {{$user->username}}</td>
                        </tr>
                        <tr>
                            <td>Email: {{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>Address: {{$user->address}}</td>
                        </tr>
                        <tr>
                            <td>Post code: {{$user->post_code}}</td>
                        </tr>
                        <tr>
                            <td>Phone number: {{$user->phone_number}}</td>
                        </tr>
                    </tbody>
                  </table>

                   <div class="form-group">
                        <div class="col-md-6" style="margin-left: 35%;">
                            <button type="submit" class="btn btn-success" onclick="window.location='{{ route("user.edit", ['id' => $user->id]) }}'">
                                Edit User
                            </button>
                            <button type="button" class="btn btn-primary" onclick="window.location='{{ route("user") }}'">Back</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
