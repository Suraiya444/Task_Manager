<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function register_save(RegisterRequest $r){
        $input=$r->all();
        $input['password']=bcrypt($input['password']);
        User::create($input);
        return redirect('login');
    }

    public function login(){
        return view('auth.login');
    }

    public function login_check(LoginRequest $request){
        try{
            $user=User::where('email',$request->email)->first();
            if($user){
                if(Hash::check($request->password , $user->password)){
                    $this->setSession($user);
                    return redirect()->route('dashboard')->with('success','Successfully login');
                }else
                    return redirect('login')->with('error','Your email or password is wrong!');
            }else
                return redirect('login')->with('error','Your email or password is wrong!');
        }catch(Exception $e){
            dd($e);
            return redirect('login')->with('error','Your email or password is wrong!');
         }
    }

    public function setSession($user){
        return request()->session()->put([
                'userId'=>encryptor('encrypt',$user->id),
                'userName'=>encryptor('encrypt',$user->name),
                'userEmail'=>encryptor('encrypt',$user->email)
            ]
        );
    }

    public function logout(){
        request()->session()->flush();
        return redirect('login')->with('danger','Successfully logged out');
    }

}
