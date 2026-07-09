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
    
    //checking password
    public function checkPassword($request){ //Check The Password
        if (Hash::check($request->password, $this->password)){
            return response()->json(['authenticated' => true], 201);
        }

        return response()->json(['authenticated' => false], 301);
    }
    //authenticate
    public function auth(Request $request){
        $this->user = Users::where("email", $request->email)->first();
        if (!$this->user){ 
            return response()->json([
                'authenticated' => false
            ], 300);
        }

        $this->email = $this->user->email;
        $this->password = $this->user->password;  
        
        return $this->checkPassword($request);   
    }

}