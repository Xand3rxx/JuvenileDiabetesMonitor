<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\PhysicianInformation;
use App\PatientInformation;

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
                    $physicianBio = PhysicianInformation::where('id', Auth::user()->id)->get();
                    // view()->composer('partials.*', function($view){
                        $view->with('user', $physicianBio);
                    // });
                }else{
                    $patientBio = PatientInformation::where('id', Auth::user()->id)->get();
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
