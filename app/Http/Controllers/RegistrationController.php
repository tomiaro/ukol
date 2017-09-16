<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\User;

class RegistrationController extends Controller
{
   public function create()
   {

   	return view("registration.create");
   }

   public function store()
   {

   	$this->validate(request(), [

   		"email" => "required|email", 
   		"password" => "required|confirmed"

   			]);
      $hashPassword = Hash::make(request()->password);
   	
       $user = User::create([
         "email" => request()->email,
         "password" =>  $hashPassword]);
   
   auth()->login($user);

   return redirect()->home();
   }



}
