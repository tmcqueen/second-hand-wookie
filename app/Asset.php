<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class Asset extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'make', 'model', 'cost', 'description', 'user_id', 'donation_id'
    ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $faker = Faker::create();
        $letters = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $this->tag = implode($faker->randomElements($letters, 6));
    }

    public function donation() {
        return $this->belongsTo(Donation::class);
    }

    public function getAttriutes() {
        return $this->attributes;
    }
}
