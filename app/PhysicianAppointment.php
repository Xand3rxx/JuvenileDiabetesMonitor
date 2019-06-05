<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicianAppointment extends Model
{
    //

    public $table = "tbl_physician_appointment";
    public $timestamps = false;

    protected $fillable = [
        'Medical_Record_No', 'Physician_ID', 'Appointment_Date', 'Appointment_Time', 'Appointment_Message', 'DateCreated',
    ];
}
