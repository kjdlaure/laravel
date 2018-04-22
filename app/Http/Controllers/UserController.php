<?php

namespace App\Http\Controllers;

use App\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   protected $model;

   public function __construct(User $user)
   {
       $this->model = new Repository($user);
   }

  //List all users
   public function index()
   {
   		$users = $this->model->all(); 
   		return view('users.index')->with('users',$users);
   }

   //Add new user
   public function store(Request $request)
   {    
      $user = $this->model->create($this->getValuesArray($request));
      return $this->show($user->id);
   }

   //Display user details
   public function show($id)
   {
       $user = $this->model->show($id);
       return view('users.show')->with('user',$user);
   }

   //Display user edit page
   public function edit($id)
   {
      $user = $this->model->show($id);
      return view('users.edit')->with('user',$user);

   }

   //Update user
   public function update(Request $request, $id)
   {
      $this->model->update($this->getValuesArray($request), $id);
      return $this->show($id);
   }

   //Delete user
   public function destroy($id)
   {
      return $this->model->delete($id);
   }

   //Retrieve user data
   private function getValuesArray(Request $request)
   {
      $array = array_filter($request->only($this->model->getModel()->fillable), 'strlen');

      if(array_key_exists('password', $array)){
        $array['password'] = Hash::make($array['password']);
      }

      return $array;
   }
}
