<?php

namespace App\Repositories;

use App\Models\User;
use DB;
use App\Models\Role;
class UserRepository
{

   public function __construct()
   {
      $this->user = new User();
   }
   public function loadUsers()
   {
      // return $this->user->orderBy('id')->get();

      return $this->user
                  ->join('roles','users.role_id','=','roles.id')
                  ->orderBy('users.id')
                  ->get();
    
   }
   public function editUser($id)
   {
      return $this->user->findOrFail($id);
   }
   public function createUser($data)
   {
      return $this->user->create($data);
   }
   public function delete($id)
   {
      return $this->user->findOrFail($id)->delete();
   }
   public function updateUser($data, $id)
   {
      $this->user->findOrFail($id)->update($data);
   }
   public function updateorcreate($data)
   {
      $this->user->updateOrCreate(
         ['employee_number' => $data['employee_number']],
         [
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'email'    => $data['email'],
            'position' => $data['position'],
            'status' => $data['status'],
            'section' => $data['section'],
            'photo' => $data['photo'],
            'password' => $data['password']
         ]
      );
   }
   public function loadPicker()
   {
      // return $this->user->orderBy('id')->get();

      return $this->user
                  ->join('roles','users.role_id','=','roles.id')
                  ->where('users.role_id',2)
                  ->orderBy('users.role_id')
                  ->get();
    
   }
}
