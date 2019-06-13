<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\PhysicianInformation;
use App\PatientInformation;
use Auth;
use DB;
use App\User;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('patient.home');
    }

    public function registerPatient(){
        //Retrieve all Physicians
        $Physician =  PhysicianInformation::select('Physician_ID', 'First_Name', 'Last_Name')->get();

       
        // return response()->json($Physician);
        return view('auth.registerPatient', compact('Physician'));
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
        //
        $valid_info = $request->validate([
            'first_name'          =>   'required',
            'middle_name'         =>   'required',
            'last_name'           =>   'required',
            'user_email'          =>   'required|email|unique:users,email',
            'user_password'       =>   'required',
            'dob'                 =>   'required',
            'guardian1_name'      =>   'required',
            'guardian1_email'     =>   'required|email',
            'guardian1_mobile_no' =>   'required|unique:tbl_patient_information,Guardian1_mobile_No',
            'gender'              =>   'required',
            'medical_record_no'   =>   'required',
            'physician_ID'        =>   'required',
            'avatar'              =>   'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        if($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $avatar = rand() .'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $avatar);
        } else{
            $avatar = 'user_avatar.jpg';
        }
        //Create record for new Physician on users table
        $new_patient = User::create([
            'email'            =>   $request->get('user_email'),
            'password'         =>   Hash::make($request->get('user_password')),
            'user_type'        =>   'Patient',
        ]);

        $new_patient_bio = PatientInformation::create([
            'Medical_Record_No'   => $request->get('medical_record_no'),
            'Physician_ID'        => $request->get('physician_ID'),
            'id'                  => $new_patient->id,
            'First_Name'          => $request->get('first_name'),
            'Middle_Name'         => $request->get('middle_name'),
            'Last_Name'           => $request->get('last_name'),               
            'Date_of_Birth'       => $request->get('dob'),
            'Gender'              => $request->get('gender'),
            'Guardian1_Name'      => $request->get('guardian1_name'),
            'Guardian2_Name'      => $request->get('guardian2_name'),
            'Guardian1_mobile_No' => $request->get('guardian1_mobile_no'),
            'Guardian2_mobile_No' => $request->get('guardian2_mobile_no'),
            'Guardian1_Email'     => $request->get('guardian1_email'),
            'Guardian2_Email'     => $request->get('guardian2_email'),
            'Avatar'              => $avatar,
        ]);

        if($new_patient AND $new_patient_bio){
            return redirect()->route('login')->with('success', ''.$request->get('first_name').' '.  $request->get('last_name').' has been created');

        // }
    }
    return back()->withInput()->with('error', 'Make sure your bio data is correct');



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
}
