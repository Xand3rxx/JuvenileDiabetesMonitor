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
            //Assign the user id to UserID variable
            $this->UserID = Auth::user()->id;
            //Assign the user type to UserType variable
            $this->UserType = Auth::user()->user_type;
            
            //Return view by UserType
            if($this->UserType === 'Physician'){
                //Get Physician First and Last names
                $physiciain_name = DB::table('tbl_physician_information')->select('First_Name', 'Last_Name')->where('id','=',$this->UserID)->first();
                foreach ($physiciain_name as $name){
                    $names[] = $name;
                }

                return redirect()->route('physicianHome')
                ->with('success', 'Welcome, Dr. '.$names[0].' '.$names[1]);
                // return response()->json($physiciain_name);
            }else{
                //Get Patient First and Last names
                $patient_name = DB::table('tbl_patient_information')->select('First_Name', 'Last_Name')->where('id','=',$this->UserID)->first();
                foreach ($patient_name as $name1){
                    $names1[] = $name1;
                }

                return redirect()->route('patientHome')
                ->with('success', 'Welcome, '.$names1[0].' '.$names1[1]);
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
            return redirect()->route('logout')->with('error', 'Your session expired, Sign In.');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/login')
        ->with('success', 'You are logged out!');
   }
}
