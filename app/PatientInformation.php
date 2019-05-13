<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientInformation extends Model
{
    public $table = "tbl_patient_information";
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        	'Medical_Record_No', 'First_Name', 'Middle_Name', 'Last_Name', 'Date_of_Birth', 'Guardian1_Name','Guardian2_Name', 'Guardian1_mobile_No', 'Guardian2_mobile_No', 'Guardian1_Email', 'Guardian2_Email', 'Avatar'
    ];
}
