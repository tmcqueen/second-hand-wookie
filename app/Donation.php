<?php

namespace App;

use LaravelArdent\Ardent\Ardent;

class Donation extends Ardent
{
    protected $fillable = ['user_id'];

    public function assets() {
        return $this->hasMany(Asset::class);
    }
}
