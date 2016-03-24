<?php

namespace App;

use LaravelArdent\Ardent\Ardent;

class History extends Ardent
{
    protected $fillable = ['user_id', 'description'];

    public static $relationsData = [
      'user' => [self::BELONGS_TO, User::class, 'user_id'],
    ];
}
