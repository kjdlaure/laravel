<?php

namespace App\Http\Controllers;

use App\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
     protected $model;

   public function __construct(User $user)
   {
       $this->model = new Repository($user);
   }

   public function index()
   {
   		$users = $this->model->all(); 
   		return view('users.index')->with('users',$users);
   }

   public function store(Request $request)
   {
      $this->model->create($request->only($this->model->getModel()->fillable));
      return $this->index();
   }

   public function show($id)
   {

       $user = $this->model->show($id);
       return view('users.show')->with('user',$user);
   }

   public function edit($id)
   {
      $user = $this->model->show($id);
      return view('users.edit')->with('user',$user);

   }

   public function update(Request $request, $id)
   {
      $values = array_filter($request->only($this->model->getModel()->fillable), 'strlen');  

      if(array_key_exists('password', $values)){
        $values['password'] = Hash::make($values['password']);
      }  

      $this->model->update($values, $id);
      return $this->show($id);
   }

   public function destroy($id)
   {
       return $this->model->delete($id);
   }
}
