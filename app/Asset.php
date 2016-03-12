<?php

namespace App;

use LaravelArdent\Ardent\Ardent;
use Faker\Factory as Faker;
use Auth;
use App\User;
use App\Document\Document;
use App\Document\Image;

class Asset extends Ardent
{
    protected $fillable = [
        'name', 'make', 'model', 'cost', 'description', 'user_id', 'donation_id', 'in_inventory'
    ];

    public static $rules = [
      'name'        => 'required|between:3,80',
    ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $faker = Faker::create();
        $letters = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $this->tag = implode($faker->randomElements($letters, 6));
        //$this->user_id = Auth::user()->id;
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function donation() {
        return $this->belongsTo(Donation::class);
    }

    public function getAttriutes() {
        return $this->attributes;
    }

    public function documents() {
        return $this->morphToMany(Document::class, 'documentable');
    }

    public function defaultImage() {
        return $this->belongsTo(Image::class, 'default_image_id');
    }
}
