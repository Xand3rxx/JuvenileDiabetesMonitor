<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
use Auth;
use User;
use PatientInformation;
use PhysicianInformation;

class LoginController extends Controller
{

    //Global variable to hold UserID and UserType
    var $UserID;
    var $UserType;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/checklogin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        if(Auth::check()  == true){
            if(Auth::user()->user_type === 'Physician'){
                return redirect()->route('physicianHome');
            }
           else // elseif(isset(Auth::user()->user_type) === 'Patient')
            {
                return redirect()->route('patientHome');
            } 
        }      
        else{
            return redirect()->route('login');
        }
    }

    public function authLogin(Request $request)
    {
        $this->validate($request, [
            'user_email'     =>  'required|email',
            'user_password'  =>  'required|AlphaNum|'
        ]);

        $user_data = array(
            'email'     =>  $request->get('user_email'),
            'password'  =>  $request->get('user_password')
        );

        if(Auth::attempt($user_data)){
            $this->UserID = Auth::user()->id;
            $this->UserType = Auth::user()->user_type;
            // $this->UserType = DB::table('users')->select('UserRoleID', 'FullName')->where('id','=',$this->UserID)->first();
            if($this->UserType === 'Physician'){
                return redirect()->route('physicianHome');
            }else{
                return redirect()->route('patientHome');
            }
        }else{
            return back()->with('error','Wrong Login Credentials');
        }
    }

    public function checkUser(){
        // $this->UserType = Auth::user()->user_type;

        // if($this->UserType === 'Physician'){
        //     return redirect()->route('physicianHome');
        // }else{
        //     return redirect()->route('patientHome');
        // }

        if(Auth::check()  == true){
            if(Auth::user()->user_type === 'Physician'){
                return redirect()->route('physicianHome');
            }
           else // elseif(isset(Auth::user()->user_type) === 'Patient')
            {
                return redirect()->route('patientHome');
            } 
        }      
        else{
            return redirect()->route('logout');
        }
    }

    function logout(){
       Auth::logout();
       return redirect('/')
       ->with('success', 'You are logged out!');
   }
}
