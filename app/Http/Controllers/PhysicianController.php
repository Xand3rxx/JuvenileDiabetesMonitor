<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\PhysicianInformation;
use App\PatientInformation;
use App\PhysicianAppointment;
use App\GlucoseValues;
use App\InsulinValues;
use App\Messages;
use DB;
use Auth;
use App\User;

class PhysicianController extends Controller
{

    public function __construct() {
        $this->middleware('auth:web'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
            Controller method to return all information required on the Physician Home page
        */

        //Return total number of registered Patients
        $totalPatients = PatientInformation::all()->count();

        //Return total number of registered Physcians
        $totalPhysicians = PhysicianInformation::all()->count();

        //Get Physician ID from tbl_physician_information
        $collection = PhysicianInformation::where('id', Auth::user()->id)->get();
        foreach($collection as $item){
            $Physician_ID = $item->Physician_ID;
        }

        //Return Appointment Table for current date
        $appointmentTable = DB::table('tbl_physician_appointment')
        ->join('tbl_patient_information', 'tbl_patient_information.id', '=', 'tbl_physician_appointment.id')->where('tbl_physician_appointment.Physician_ID', $Physician_ID)
        ->whereDate('Appointment_Date', \Carbon\Carbon::today())->orderBy('Appointment_Time', 'asc')->get();

        //Return total number of appointments for a Physician for all time
        $totalAppointments = PhysicianAppointment::where('Physician_ID', $Physician_ID)->count();

        //Return total number of appointments for a Physician on current date
        $totalAppointmentsToday = $appointmentTable->count();

       return view('physician.home', compact('appointmentTable', 'totalPatients', 'totalPhysicians', 'totalAppointmentsToday', 'totalAppointments'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->user_id = Auth::user()->id;
        // if(empty($this->user_id)){
        //     return redirect()->route('login');
        // }

        $valid_info = $request->validate([
            'first_name'         =>   'required',
            'middle_name'         =>   'required',
            'last_name'         =>   'required',
            'physician_ID'         =>   'required',
            'user_email'             =>   'required|email|unique:users,email',
            'user_password'          =>   'required',
            'mobile_no'             =>   'required|unique:tbl_physician_information,Mobile_No',
            'gender'            =>   'required',
            'avatar'     =>   'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // if($valid_info)
        // {
            //Check if image avatar was uploaded
            if($request->hasFile('avatar')){
                $image = $request->file('avatar');
                $avatar = rand() .'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $avatar);
            } else{
                $avatar = 'user_avatar.jpg';
            }
            //Create record for new Physician on users table
            $new_physician = User::create([
                'email'            =>   $request->get('user_email'),
                'password'         =>   Hash::make($request->get('user_password')),
                'user_type'        => 'Physician',
            ]);

            $new_physician_bio = PhysicianInformation::create([
                'Physician_ID'        => $request->get('physician_ID'),
                'id'        => $new_physician->id,
                'First_Name'            =>   $request->get('first_name'),
                'Middle_Name'         =>   $request->get('middle_name'),
                'Last_Name'        => $request->get('last_name'),               
                'Mobile_No'        => $request->get('mobile_no'),
                'Gender'        => $request->get('gender'),
                'Avatar'        => $avatar,
            ]);

            if($new_physician AND $new_physician_bio){
                return redirect()->route('login')->with('success', 'Dr. '.$request->get('first_name').' '.  $request->get('last_name').' has been created');

            // }
        }

        return back()->withInput()->with('error', 'Make sure your bio data is correct');
    }

    public function allPatients(){
        /*
            Controller method to return all information for all registered patients
        */

        //Return all patients bio-data
        $patientsBioData = PatientInformation::all();

        return view('physician.allPatients', compact('patientsBioData'))->with('i');
    }

    public function allAppointments(){
        /*
            Controller method to return all information for all registered patients
        */

        //Get Physician ID from tbl_physician_information
        $collection = PhysicianInformation::where('id', Auth::user()->id)->get();
        foreach($collection as $item){
            $Physician_ID = $item->Physician_ID;
        }

        //Return Appointment Table for current date
        $appointmentTable = DB::table('tbl_physician_appointment')
        ->join('tbl_patient_information', 'tbl_patient_information.id', '=', 'tbl_physician_appointment.id')->where('tbl_physician_appointment.Physician_ID', $Physician_ID)
        ->whereDate('Appointment_Date', \Carbon\Carbon::today())->orderBy('Appointment_Time', 'asc')->get();

        //Return total number of appointments for a Physician on current date
        $totalAppointmentsToday = $appointmentTable->count();

        //Return all previous appointments Table for Physician
        $previousAppointmentTable = DB::table('tbl_physician_appointment')
        ->join('tbl_patient_information', 'tbl_patient_information.id', '=', 'tbl_physician_appointment.id')->where('tbl_physician_appointment.Physician_ID', $Physician_ID)
        ->whereDate('Appointment_Date', '!=', \Carbon\Carbon::today())->orderBy('Appointment_Time', 'asc')->get();

        return view('physician.allAppointments', compact('appointmentTable', 'totalAppointmentsToday', 'previousAppointmentTable'))->with('i');

        // return response()->json(compact('previousAppointmentTable'));

    }

    public function settings(){
        return view('physician.settings')->with('i');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewPatientProfile($id){
        /*
            Controller method to return all information about a Patient
        */
        $patientProfile = PatientInformation::where('Medical_Record_No', $id)->get();

        //Get glucose readings for patient
        $glucoseValues = GlucoseValues::where('Medical_Record_No', $id)->get();
        $insulinValues = InsulinValues::where('Medical_Record_No', $id)->get();

        $gluMeasurement = array();
        $gluMeasurement1 = array();
        $gluDate = array();
        $gluDate1 = array();
        $gluTime = array();
        $gluTime1 = array();
        $dateTime = array();
        $dateTime1 = array();

        foreach($glucoseValues as $item){
            $gluMeasurement[] = $item->Glucose_Measurement;
            $gluDate[] = $item->BG_Date;
            // $gluTime[] = $item->BG_Time;
            $gluTime[] = $item->BG_Date.' '.$item->BG_Time;
            
        }
        foreach($insulinValues as $item){
            $gluMeasurement1[] = $item->Insulin_injection_value;
            $gluDate1[] = $item->Insulin_Date;
            $gluTime1[] = $item->Insulin_Date.' '.$item->Insulin_Time;
            
        }
        // echo json_decode($gluTime1).' '.json_encode($gluDate1);
        // $dateTime = $gluDate.' '.$gluTime;
        // return response()->json($gluTime);

        return view('physician.viewPatientProfile', compact('patientProfile', 'gluMeasurement', 'gluDate', 'gluTime', 'gluMeasurement1', 'gluDate1', 'gluTime1'));
    }

    public function viewPatientMessages($id){
        /*
            Controller method to return all information about a Patient
        */
        $collection = PhysicianInformation::where('id', Auth::user()->id)->get();
        foreach($collection as $item){
            $Physician_ID = $item->Physician_ID;
        }
        $patientProfile = PatientInformation::where('Medical_Record_No', $id)->get();

        $patientMessage = Messages::where('Medical_Record_No', $id)
        ->where('Physician_ID', $Physician_ID)->latest('SentDate')->get();
        // return response()->json($patientProfile);
        return view('physician.viewPatientMessages', compact('patientMessage', 'patientProfile'));
    }
}
