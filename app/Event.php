<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'start', 'end', 'allday', 'title',
        'location', 'slug', 'description',
        'latitude', 'longitude', 'organizer'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }
}
