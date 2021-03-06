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
        ->join('tbl_patient_information', 'tbl_patient_information.Medical_Record_No', '=', 'tbl_physician_appointment.Medical_Record_No')->where('tbl_physician_appointment.Physician_ID', $Physician_ID)
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

    public function updateProfile(Request $request){
        $avatar = PhysicianInformation::select('Avatar')->where('id', Auth::user()->id)->get();
        //Check if image avatar was uploaded
        if($request->hasFile('Avatar')){
            $image = $request->file('Avatar');
            $avatar = rand() .'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $avatar);
        } else{
            foreach($avatar as $avi){
                $avatar = $avi->Avatar;
            }
        }

        $update_physician_bio = PhysicianInformation::where('id', Auth::user()->id)->update([
            'Physician_ID'          => $request->get('Physician_ID'),
            'id'                    => $request->get('id'),
            'First_Name'            => $request->get('First_Name'),
            'Middle_Name'           => $request->get('Middle_Name'),
            'Last_Name'             => $request->get('Last_Name'),               
            'Mobile_No'             => $request->get('Mobile_No'),
            'Gender'                => $request->get('Gender'),
            'Avatar'                => $avatar
        ]);

        if($update_physician_bio){
            return back()->with('success', 'Dr. '.$request->get('First_Name').' '.  $request->get('Last_Name').' profile has been updated');
        }else{
            return back()->withInput()->with('error', 'Make sure your bio data is correct');
        }
        //  return response()->json($avatar);

    }

    public function allPatients(){
        /*
            Controller method to return all information for all registered Patients
        */

        //Return all patients bio-data
        $patientsBioData = PatientInformation::all();

        return view('physician.allPatients', compact('patientsBioData'))->with('i');
    }

    public function allPhysicians(){
        /*
            Controller method to return all information for all registered Physicians
        */

        //Return all patients bio-data
        $physiciansBioData = PhysicianInformation::all();
        // $physiciansBioData = $physiciansBioData->paginate(10);

        // return view('physician.allPhysicians', compact('physiciansBioData'))->with('i', (request()->input('page', 1) -1)*10);
        return view('physician.allPhysicians', compact('physiciansBioData'))->with('i');
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
        ->join('tbl_patient_information', 'tbl_patient_information.Medical_Record_No', '=', 'tbl_physician_appointment.Medical_Record_No')->where('tbl_physician_appointment.Physician_ID', $Physician_ID)
        ->whereDate('Appointment_Date', \Carbon\Carbon::today())->orderBy('Appointment_Time', 'asc')->get();

        //Return total number of appointments for a Physician on current date
        $totalAppointmentsToday = $appointmentTable->count();

        //Return all previous appointments Table for Physician
        $previousAppointmentTable = DB::table('tbl_physician_appointment')
        ->join('tbl_patient_information', 'tbl_patient_information.Medical_Record_No', '=', 'tbl_physician_appointment.Medical_Record_No')->where('tbl_physician_appointment.Physician_ID', $Physician_ID)
        ->whereDate('Appointment_Date', '<', \Carbon\Carbon::today())->orderBy('Appointment_Date', 'asc')->get();

        $upcomingAppointmentTable = DB::table('tbl_physician_appointment')
        ->join('tbl_patient_information', 'tbl_patient_information.Medical_Record_No', '=', 'tbl_physician_appointment.Medical_Record_No')->where('tbl_physician_appointment.Physician_ID', $Physician_ID)
        ->whereDate('Appointment_Date', '>', \Carbon\Carbon::today())->orderBy('Appointment_Date', 'asc')->get();

        //Return total number of upcoming appointments for a Physician 
        $totalUpcomingAppointments = $upcomingAppointmentTable->count();

        return view('physician.allAppointments', compact('appointmentTable', 'totalAppointmentsToday', 'previousAppointmentTable', 'upcomingAppointmentTable', 'totalUpcomingAppointments'))->with('i');

        // return response()->json(compact('previousAppointmentTable'));

    }

    public function settings(){

        $collection = PhysicianInformation::where('id', Auth::user()->id)->get();
        return view('physician.settings', compact('collection'));
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
        $glucoseValuesCount = $glucoseValues->count();

        $gluMeasurement = array();
        $gluMeasurement1 = array();
        $gluDate = array();
        $gluDate1 = array();
        $gluTime = array();
        $gluTime1 = array();
        $dateTime = array();
        $dateTime1 = array();
        $riskValue = 0;

        foreach($glucoseValues as $item){
            $gluMeasurement[] = $item->Glucose_Measurement;
            $gluDate[] = $item->BG_Date;
            // $gluTime[] = $item->BG_Time;
            $gluTime[] = $item->BG_Date.' '.$item->BG_Time.' '.$item->Patient_Stated_Reason;
            // $gluTime[] = $item->BG_Date.' '.$item->BG_Time;
            $riskValue +=  $item->Glucose_Measurement;
        }
        foreach($insulinValues as $item){
            $gluMeasurement1[] = $item->Insulin_injection_value;
            $gluDate1[] = $item->Insulin_Date;
            $gluTime1[] = $item->Insulin_Date.' '.$item->Insulin_Time;
            
        }
        if (!empty($riskValue))
        {
            $riskValue = number_format($riskValue/$glucoseValuesCount);
        }else{
            $riskValue = 100;
        }
        
        // echo json_decode($gluTime1).' '.json_encode($gluDate1);
        // $dateTime = $gluDate.' '.$gluTime;
        // return response()->json($riskValue);

        return view('physician.viewPatientProfile', compact('patientProfile', 'gluMeasurement', 'gluDate', 'gluTime', 'gluMeasurement1', 'gluDate1', 'gluTime1', 'riskValue'));
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
        ->where('Physician_ID', $Physician_ID)->orderBy('TimeStamp', 'asc')->get();
        $messageCount = $patientMessage->count();

        // return response()->json($messageCount);
        return view('physician.viewPatientMessages', compact('patientMessage', 'patientProfile', 'messageCount', 'collection'));
    }

    public function physicianScheduleAppointment(Request $request){
        /*
            Controller method to enable a Physician schedule an appointment wiht a Patient
        */
        $valid_info = $request->validate([
            'datepicker'         =>  'required',
            'timepicker'         =>  'required',
        ]);
        if($valid_info){
            //Get Physician ID
            $Physician_ID = PhysicianInformation::select('Physician_ID')->where('id', Auth::user()->id)->first();

            //Create record for new Physician appointment on tbl_physician_appointment table
            $new_appointment = PhysicianAppointment::create([
                'Physician_ID'                 =>   $Physician_ID->Physician_ID,
                'Medical_Record_No'            =>   $request->get('PatientID'),
                'Appointment_Date'             =>   $request->get('datepicker'),
                'Appointment_Time'             =>   $request->get('timepicker'),
                'Appointment_Message'          =>   $request->get('Appointment_Message'),
            ]);

            if($new_appointment){
                return back()->with('success', 'Appointment has been created');
            }else{
                return back()->with('error', 'Failed to create appointment');
            }
        }else{
            return back()->with('error', 'Select Appointment Date and Time');
        }
        
    }

    public function messagePatient(Request $request){
        $valid_info = $request->validate([
            'Message_Body'         =>  'required',
        ]);

        if($valid_info){
            //Create record for new Physician-Patient Message on tbl_patient_physician_messages table
            $new_message = Messages::create([
                'Medical_Record_No'            =>   $request->get('Medical_Record_No'),
                'Physician_ID'                 =>   $request->get('Physician_ID'),
                'Message_Body'             =>   $request->get('Message_Body'),
                'Status'             =>   $request->get('Status'),
            ]);
            if($new_message){
                return back()->with('success', 'Message sent');
            }else{
                return back()->with('error', 'Message not sent');
            }
        }
    }
}
