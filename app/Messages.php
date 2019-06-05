<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    //
    public $table = "tbl_patient_physician_messages";
    public $timestamps = false;

    protected $fillable = [
        'Medical_Record_No', 'Physician_ID', 'Message_Body', 'Status', 'TimeStamp',
    ];
}
