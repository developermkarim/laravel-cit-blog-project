<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Stevebauman\Location\Facades\Location;
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
        Schema::defaultStringLength(191);
       /*  View::composer('*',function($view){ */

            // Set the timezone to Dhaka
     // date_default_timezone_set('Asia/Dhaka');

      // Create a Carbon instance with the specified date

           // $carbonDate = Carbon::create(date('Y-m-d'));

            // Format the date as desired
           // $todayDate = $carbonDate->format('l, jS F Y');

            /* Location wise Country or City Name */
           // $clientIP = \Request::ip(); // REQUEST Class Dependency can be used like \Request (backslash with dependency injection)
            // dd($clientIP);
           // $location = Location::get($clientIP); // it is not used in local but for online domain system newtwork.
           // $location = Location::get('127.0.0.1'); // it is work on our local
            // $locationName = $location->cityName;
            // dd($location);
          /*  <p><b>Country:</b> {{ $location->countryName }}</p>
            <p><b>Country Code:</b> {{ $location->countryCode }}</p>
            <p><b>Region Code:</b> {{ $location->regionCode }}</p>
            <p><b>Region Name:</b> {{ $location->regionName }}</p>
            <p><b>City Name:</b> {{ $location->cityName }}</p>
            <p><b>Zip Code:</b> {{ $location->zipCode }}</p>
            <p><b>Latitude:</b> {{ $location->latitude }}</p>
            <p><b>Longitude:</b> {{ $location->longitude }}</p>
            <p><b>Area Code:</b> {{ $location->areaCode }}</p>
            
            */
            // $view->with('formateDate',$todayDate);
 
    }
}
