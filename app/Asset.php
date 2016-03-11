<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Auth;
use App\Document\Document;
use App\Document\Image;

class Asset extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'make', 'model', 'cost', 'description', 'user_id', 'donation_id', 'in_inventory'
    ];

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $faker = Faker::create();
        $letters = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $this->tag = implode($faker->randomElements($letters, 6));
        $this->user_id = Auth::user()->id;
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

    // public function documents() {
    //     $faker = Faker\Factory::create();

    //     return [
    //       new Image(['path' => $faker->imageUrl(140,140)]),
    //       new Image(['path' => $faker->imageUrl(140,140)]),
    //       new Image(['path' => $faker->imageUrl(140,140)]),
    //       new Image(['path' => $faker->imageUrl(140,140)]),
    //     ];
    // }
}
