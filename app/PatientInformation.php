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
        'Medical_Record_No', 'Physician_ID', 'id', 'First_Name', 'Middle_Name', 'Last_Name', 'Date_of_Birth', 'Gender', 'Guardian1_Name','Guardian1_Email', 'Guardian1_mobile_No', 'Avatar'
    ];
}
