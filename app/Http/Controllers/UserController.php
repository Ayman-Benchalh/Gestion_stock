<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
       return view('authentif.loginPage');
    }
    public function login(Request $request){
        $email=$request->email;
        $password=$request->password;
        $request->validate([
            'email'=>['email','required','min:8','exists:users,email'],
            'password'=>['required','min:5'],
        ]);
       dd($email,$password);
    }
    public function CreatAccountPost(Request $request){
        $NomComplet =$request->NomComplet;
        $email =$request->email;
        $password =$request->password;
        $request->validate([
            'NomComplet'=>['required','min:8'],
            'email'=>['email','required','min:8'],
            'password'=>['required','min:5'],
        ]);
        $string_NomComplet = str_replace(' ', '', $NomComplet);
        $value=['email'=>$email,'password'=>$password];
        // dd(Auth::attempt($value));
        if(!Auth::attempt($value)){
            User::create([
                        'Nom_Complet'=>$string_NomComplet,
                        'email'=>$email,
                        'password'=>$password,
                    ]);

               $token = Str::random(4);
                Mail::send('TempletVerfi',['token'=>$token],function($message){
                        $message->to(request()->email);
                        $message->subject('OTP Verif Account');
                    });
        }else{
             return back()->withErrors('email','Youe have Account Plez Login ...');
        }


            // dd('email is send to your boitEmail now ');
            return redirect()->route('IndexUser');


    }
    public function CreatAccount(Request $request){
        return view('authentif.CreateAccount');
    }
}
