<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider {

    public function boot() {

        Validator::extend('alpha_dot', function($attribute, $value) {
            return preg_match('/^[\pL\.\-\_]+$/u', $value);
        });

    }

    public function register() {

        //

    }
}

