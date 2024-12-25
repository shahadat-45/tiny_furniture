<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Department;
use App\Models\Project;
use App\Models\Schedule;
use App\Models\Service;
use Illuminate\Support\ServiceProvider;
use App\Models\About;
use App\Models\Banner;
use App\Models\BasicInfo;
use App\Models\Doctor;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function($view)
        { 
            $basicInfo = BasicInfo::getData();
            $services  = Service::where('status',1)->get();
            $schedule = Schedule::where('status',1)->get();
            $departments= Department::get();

            $view->with([
                'basicInfo' => $basicInfo,
                'services' => $services,
                'schedule' => $schedule,
                'departments' => $departments,
            ]);
        });

        view()->composer('frontend.pages.static_pages.doctor', function($view)
        {
            $doctor = Doctor::all();
                
            $view->with([
                'doctor' => $doctor,
            ]);
        });
        


    }
}
