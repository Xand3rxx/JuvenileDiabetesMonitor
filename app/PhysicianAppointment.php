<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicianAppointment extends Model
{
    //

    public $table = "tbl_physician_appointment";

    protected $fillable = [
        'id', 'Physician_ID', 'Appointment_Time', 'DateCreated',
    ];
}
