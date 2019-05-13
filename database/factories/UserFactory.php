<?php

use App\User;
use App\PatientInformation;
use App\PhysicianInformation;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(PhysicianInformation::class, function (Faker $faker) {
    // return [
    //     // 'name' => $faker->name,
    //     'email' => $faker->unique()->safeEmail,
    //     // 'email_verified_at' => now(),
    //     'password' => Hash::make('password'),
    //     'user_type' => $faker->randomElement(['Physician' ,'Patient']),
    //     'DateCreated' => $faker->dateTime($max = 'now'),

    //     // 'remember_token' => Str::random(10),
    // ];

    // return [
 	
    //     'Medical_Record_No' => $faker->numberBetween(1000000000,9999999999),
    //     'First_Name' => $faker->firstName,
    //     'Middle_Name' => $faker->lastName,
    //     'Last_Name' => $faker->lastName,
    //     'Date_of_Birth' => $faker->dateTimeThisCentury->format('Y-m-d'),
    //     'Guardian1_Name' => $faker->name,
    //     'Guardian2_Name' => $faker->name,
    //     'Guardian1_mobile_No' => $faker->e164PhoneNumber,
    //     'Guardian2_mobile_No' => $faker->e164PhoneNumber,
    //     'Guardian1_Email' => $faker->unique()->safeEmail,
    //     'Guardian2_Email' => $faker->unique()->safeEmail,
    //     'DateCreated' => $faker->dateTime($max = 'now'),
    //     // 'Email_verified_at' => now(),
    //     // 'password' => $faker->password,//Hash::make(str_random(10)), // password
    //     // 'remember_token' => Str::random(10),
           
    // ];

    return [
 	
        'Physician_ID' => $faker->numberBetween(1000000000,9999999999),
        'id' => $faker->numberBetween(1,20),
        'First_Name' => $faker->firstName,
        'Middle_Name' => $faker->lastName,
        'Last_Name' => $faker->lastName,
        'Mobile_No' => $faker->e164PhoneNumber,   
        'Gender' => $faker->randomElement(['Male' ,'Female']),      
        // 'Avatar' => 'Image avatar',
    ];
});
