<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\PhysicianInformation;
use App\PatientInformation;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        
        view()->composer('partials.*', function($view){
            if(Auth::check()  == true){
                if(Auth::user()->user_type == 'Physician'){
                    // $physicianBio = PhysicianInformation::where('id', Auth::user()->id)->get();
                    // view()->composer('partials.*', function($view){
                        // $user_type = Auth::user()->user_type;
                        // $data = [
                        //     'physicianBio' => $physicianBio,
                        //     'user_type' => Auth::user()->user_type
                        // ];
                        // $physicianBio['user_type'] = Auth::user()->user_type;
                         $physicianBio = DB::table('users')
                        ->join('tbl_physician_information', 'tbl_physician_information.id', '=', 'users.id')->where('users.id', Auth::user()->id)->get();
                        $view->with('user', $physicianBio);
                        // $view->with('user', $data);
                    // });
                }else{
                    // $patientBio = PatientInformation::where('id', Auth::user()->id)->get();
                    $patientBio = DB::table('users')
                    ->join('tbl_patient_information', 'tbl_patient_information.id', '=', 'users.id')->where('users.id', Auth::user()->id)->get();
                    // view()->composer('partials._navbar', function($view){
                        $view->with('user', $patientBio);
                    // });
                }
            }
            else{
                return redirect()->route('login');
            }
            
            // $view->with('navbar', Auth::user()->user_type);
        });
    }
}
