<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class LoginAuthController extends Controller{

    protected $user;
    protected $email; 
    protected $password;
    protected $bool = false;
    
    //checking password
    public function checkPassword($request){ //Check The Password
        if (Hash::check($request->password, $this->password)){
            $this->bool = true;
        }else{
            $this->bool = false;
        }
    }
    //authenticate
    public function auth(Request $request){
        $this->user = Users::where("email", $request->email)->first();
        if (!$this->user || Hash::check($request->email, $this->email)){ 
            return response()->json([
                'authenticated' => $this->bool
            ], 300);
        } else {
            $this->email = $this->user->email;
            $this->password = $this->user->password;  
            $this->checkPassword($request);   
            return response()->json(['authenticated' => $this->bool], 201);
        }           
    }

}