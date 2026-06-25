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
    protected $bool;

    public function init($request){
        $this->user = Users::where("email", $request->email)->first(); 
        $this->email = $this->user->email;
        $this->password = $this->user->password;
    }
    public function checkPassword($request){
        if (Hash::check($request->password, $this->password)){
            $this->bool = true;
        }else{
            $this->bool = false;
        }
    }

    public function auth(Request $request){
        $this->init($request);
        $this->checkPassword($request);
        
        return response()->json([$this->bool], 201);
    }

}