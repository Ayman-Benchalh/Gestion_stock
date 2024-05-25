<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\User;
use App\Models\Vente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
        ]); // dd($totelVEr   ,session()->get('VerficOTP'));
        $value = ['email'=>$email,'password'=>$password];
        if(Auth::attempt($value)){
           $dataUser= User::where('email',$email)->first();
           session([
            'id_User'=>$dataUser->id,
            'Nom_Complet'=>$dataUser->Nom_Complet,
            'email'=>$dataUser->email,

           ]);
            return redirect()->route('DashBord_user');
        }else{
           return back()->with('errorMessage',"Erreur de connexion au compte, correction s'il vous plaît");
        }
    //    dd(Auth::attempt($value),$email,$password,session()->all());
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
                        'Nom_commercial'=>'',
                        'Telephone'=>'',
                        'Adresse'=>'',
                    ]);

            //    $token = Str::random(4);
               $token = rand(1000,9999);
                Mail::send('TempletVerfi',['token'=>$token],function($message){
                        $message->to(request()->email);
                        $message->subject('OTP Verif Account');
                    });
                session(['email'=>$email,'VerficOTP'=>$token]);

        }else{
             return back()->with('errorMessage','Youe have Account Plez Login ...');
        }



            return redirect()->route('verficOTP');


    }
    public function CreatAccount(Request $request){
        return view('authentif.CreateAccount');
    }
    public function verficOTP(Request $request){
        return view('authentif.verficOTP');
    }
    public function verficOTP_Post(Request $request){
        $Num1=$request->Num1;
        $Num2=$request->Num2;
        $Num3=$request->Num3;
        $Num4=$request->Num4;
        $totelVEr =$Num1.$Num2.$Num3.$Num4;
        // dd($totelVEr   ,session()->get('VerficOTP'));
            if($totelVEr == session()->get('VerficOTP')){
                session()->put('VerficOTP','Account is verfi');
                User::where('email',session()->get('email'))->update([
                    'email_verified_at'=>Carbon::now()

                ]);
                return redirect()->route('IndexUser')->with('MessageSucces','Your email is verfi Now ,login for access to your app');
            }else{
                return back()->with('errorMessage','Code OTP Incorrect Plez check your email ....');
            }


    }

    public function Forget_Pas(){


        return view('authentif.ForgetPassword');  
    }
    public function Forget_Pas_post(Request $request){
        $email=$request->email;

        request()->validate([
            'email'=>['email','required','min:8','exists:users,email']
        ]);
        // $token=str::random(4);
        $token=rand(1000,9999);
        Session(['forgetToken'=>$token]);
        Mail::send('TempletVerfi',['token'=> $token],function($message){
            $message->to(Request()->email);
            $message->subject('Forget Password');
        });
        // dd($email,session()->all());
        return redirect()->route('ResetOTP');
    }
    public function Reset_Pas(){
        return view('authentif.ResetPassword');
    }
    public function Reset_Pas_P(Request $request){
        $email=$request->email;
        $password=$request->password;
        // dd($email,$password,session()->all());
        return redirect()->route('IndexUser')->with('MessageSucces','Récupération du mot de passe bon réussie ');
    }
    public function ResetOTP(){
        return view('authentif.ResetOTP');
    }
    public function ResetOTP_Post(Request $request){
        $Num1=$request->Num1;
        $Num2=$request->Num2;
        $Num3=$request->Num3;
        $Num4=$request->Num4;
        $totelVEr =$Num1.$Num2.$Num3.$Num4;

            if($totelVEr == session()->get('forgetToken')){
                session()->put('forgetToken','Account is verfi');
                return redirect()->route('ResetPassword')->with('MessageSucces','Votre email est verfi , connectez-vous pour accéder à votre application');
            }else{
                return back()->with('errorMessage','Code OTP Incorrect Plez check your email ....');
            }

    }
    public function DashBord_User(){
        $dataClient= Client::all()->count();
        $dataFourni= Fournisseur::all()->count();
        $dataProduit= Produit::all()->count();
        $dataAchat= Achat::all()->count();
        $dataVente= Vente::all()->count();
        $dataVenteall= Vente::all();
        $dataproduitMinthre=Produit::where('Quantité','<=',3)->get();
        // dd($dataproduitMinthre);
        return view('dashBordPage' ,compact('dataClient','dataFourni','dataProduit','dataAchat','dataVente','dataVenteall','dataproduitMinthre'));
     }

     public function logOut(){
        session()->flush();
        Auth::logout();
        return to_route('IndexUser');
     }

     public function ParametreEdite(){
        $dataUser=User::findOrfail(session()->get('id_User'));
        // dd($dataUser);
        return view('Parametre_page',compact('dataUser'));
     }
     public function ParametreUpdate(Request $request){
        $NomComplet=$request->NomComplet;
        $Email=$request->Email;
        $Adresse=$request->Adresse;
        $NomCommercial=$request->NomCommercial;
        $Telephone=$request->Telephone;
        request()->validate([
            'NomComplet'=>['required','exists:users,Nom_Complet'],
            'Email'=>['required','exists:users,email'],
            'Adresse'=>['required'],
            'NomCommercial'=>['required'],
            'Telephone'=>['required'],
        ]);
        User::where('Nom_Complet',$NomComplet)->where('email',$Email)->update([
            'Adresse'=>$Adresse,
            'Nom_commercial'=>$NomCommercial,
            'Telephone'=>$Telephone,
        ]);
        $dataUser=User::findOrfail(session()->get('id_User'));
        return redirect()->route('parametre_page',compact('dataUser'))->with('success',"les informations  de {$NomComplet} est changé");
        // dd($NomComplet,$Email, $NomCommercial,$Telephone);
     }


}
