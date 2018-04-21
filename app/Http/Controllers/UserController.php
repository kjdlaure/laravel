<?php

namespace App\Http\Controllers;

use App\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;

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
       return $this->model->create($request->only($this->model->getModel()->fillable));
   }

   public function show($id)
   {

       $user = $this->model->show($id);
       return view('users.show')->with('user',$user);
   }

   public function update(Request $request, $id)
   {
       $this->model->update($request->only($this->model->getModel()->fillable), $id);

       return $this->model->find($id);
   }

   public function destroy($id)
   {
       return $this->model->delete($id);
   }
}
