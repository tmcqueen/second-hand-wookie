<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = ['user_id'];

    public function assets() {
        return $this->hasMany(Asset::class);
    }
}
