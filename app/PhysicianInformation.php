<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicianInformation extends Model
{
    //
    public $table = "tbl_physician_information";
    public $timestamps = false;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'Physician_ID', 'id', 'First_Name', 'Middle_Name', 'Last_Name', 'Mobile_No', 'Gender', 'Avatar',
    ];
}
