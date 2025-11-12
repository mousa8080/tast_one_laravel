<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  { //register prepreation  work classes 
    //create  provider and class difinition classes and 
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Validator::extend('filter', function ($attribute, $value, $parameters, $validator) {
      return !in_array($value, $parameters);
    }, 'The :attribute is aaaaaaaa');

    Gate::define('create-post',function($user){
      return in_array($user->role,['admin','writer']);
    });


























    // Gate::define("create-post", function ($user) {
    //   return in_array($user->role, ["admin", "writer"]);
    // });
  }
}
