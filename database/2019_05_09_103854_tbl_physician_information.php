<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblPhysicianInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_physician_information', function (Blueprint $table) {
            $table->unsignedBigInteger('Physician_ID');
            $table->unsignedBigInteger('id')->index();
            $table->string('First_Name');
            $table->string('Middle_Name');
            $table->string('Last_Name');
            $table->string('Mobile_No','15')->unique();
            $table->enum('Gender',['Male','Female']);
            $table->string('Avatar')->default(NULL);

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
        Schema::dropIfExists('tbl_physician_information');
    }
}
