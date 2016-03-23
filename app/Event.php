<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelArdent\Ardent\Ardent;

class Event extends Ardent
{
    protected $fillable = [
        'name', 'start', 'end', 'allday', 'title',
        'location', 'slug', 'description',
        'latitude', 'longitude', 'organizer'
    ];

    public static $relationsData = [
      'organizer' => [self::BELONGS_TO, User::class, 'organizer_id'],
    ];

    public function getRouteKeyName() {
        return 'slug';
    }
}
