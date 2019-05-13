<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblPhysicianAppointment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_physician_appointment', function (Blueprint $table) {
            $table->bigIncrements('Appintment_ID');
            $table->unsignedBigInteger('id')->index();    
            $table->unsignedBigInteger('Physician_ID')->index();    
            $table->timestamp('Appointment_Time');
            $table->timestamp('DateCreated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('tbl_physician_appointment');
    }
}
