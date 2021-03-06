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
   		$users = $this->model->paginate(10); 
   		return view('users.index')->with('users',$users);
   }

   //Add new user
   public function store(Request $request)
   {    
      $user = $this->model->create($this->getValuesArray($request));
      flash('User successfully added!')->success();
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
      flash('User successfully updated!')->success();
      return $this->show($id);
   }

   //Delete user
   public function destroy($id)
   {
      $this->model->delete($id);
      return response()->json(['success'=>"User Deleted successfully!", 'tr'=>'tr_'.$id]);
   }

   //Delete multiple users
   public function deleteMultiple(Request $request)
   {
      $ids = $request->ids;
      $this->model->delete(explode(",",$ids));
      return response()->json(['success'=>"User/s Deleted successfully!"]);
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
